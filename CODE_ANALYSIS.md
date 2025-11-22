# Emily Bakes Cakes Website - Code Analysis Report

**Generated:** November 21, 2025  
**Project:** EmilyBakesCakesWebsiteFINAL  
**Status:** ⚠️ MULTIPLE ISSUES IDENTIFIED

---

## Executive Summary

The project is a **hybrid application** combining:
- **Part 1:** Static HTML/CSS/JS public website (working well)
- **Part 2:** PHP/MySQL staff backend (has critical issues)
- **Part 3:** Next.js/TypeScript admin dashboard (has configuration issues)

**Critical Issues Found:** 6  
**High Priority Issues:** 5  
**Medium Priority Issues:** 4  
**Low Priority Issues:** 3

---

## 🚨 CRITICAL ISSUES

### 1. **SQL Injection Vulnerabilities in PHP**
**File:** `staff/order_create.php`, `staff/orders.php`, and other PHP files  
**Severity:** CRITICAL  
**Problem:**
```php
// VULNERABLE - Direct variable interpolation in SQL
$query = "INSERT INTO orders (customer_id, pickup_date, ...) 
          VALUES ($customer_id, '$pickup_date', '$pickup_time', '$cake_type', ...)";
```
Even though `clean_input()` is called, the function uses deprecated security practices and is insufficient for SQL injection prevention.

**Risk:** Database compromise, data theft, data manipulation  
**Fix:** Use prepared statements with parameterized queries
```php
// SECURE - Prepared statement
$stmt = $conn->prepare("INSERT INTO orders (customer_id, pickup_date, ...) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $customer_id, $pickup_date, $pickup_time, $cake_type);
$stmt->execute();
```

---

### 2. **Password Stored in Plain Text**
**File:** `staff/login.php`  
**Severity:** CRITICAL  
**Problem:**
```php
$validUsers = [
    'manager@emilybakes.com' => ['password' => 'Demo2024!', 'role' => 'manager'],
    'sales@emilybakes.com' => ['password' => 'Demo2024!', 'role' => 'sales'],
    // ... all hardcoded plain text passwords
];
```
Passwords visible in source code and compared in plain text.

**Risk:** Complete compromise if file is exposed  
**Fix:** Use proper password hashing
```php
// SECURE
if (password_verify($password, $user['password_hash'])) {
    // Login successful
}
```

---

### 3. **No CSRF Protection**
**File:** All PHP forms (`staff/order_create.php`, `staff/customer_form.php`, etc.)  
**Severity:** CRITICAL  
**Problem:** Forms accept POST requests without CSRF tokens
```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // No token verification
    // Forms can be forged from other sites
}
```

**Risk:** Attackers can forge form submissions from other sites  
**Fix:** Implement CSRF tokens
```php
// Generate
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// Verify
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('CSRF token validation failed');
}
```

---

### 4. **Missing Authentication Checks in Critical Pages**
**File:** `staff/order_create.php`, `staff/customers.php`, `staff/orders.php`  
**Severity:** CRITICAL  
**Problem:** Files don't call `requireLogin()` from `auth.php`
```php
<?php
// No authentication check!
include 'includes/db.php';
// ... immediately accepts requests
```

**Risk:** Anyone can directly access URLs and perform operations without logging in  
**Fix:**
```php
<?php
include 'includes/auth.php';
requireLogin();  // Add this
```

---

### 5. **Inconsistent Session Key Names**
**File:** `staff/login.php` vs `staff/includes/auth.php`  
**Severity:** HIGH  
**Problem:** Login script uses `$_SESSION['user_role']` but other files may expect `$_SESSION['role']`
```php
// login.php
$_SESSION['user_role'] = $validUsers[$email]['role'];

// auth.php checks
$_SESSION['role'] ?? 'Guest'  // Different key!
```

**Risk:** Role-based access control failures  
**Fix:** Standardize all session keys throughout the application

---

### 6. **Next.js Auth Implementation Issues**
**File:** `app/login/page.tsx`  
**Severity:** CRITICAL  
**Problem:** Authentication stored in localStorage (client-side only)
```typescript
// INSECURE
localStorage.setItem("user", JSON.stringify(user))
```
Client-side storage can be manipulated, no server validation.

**Risk:** User object can be forged by any client  
**Fix:** Use Next.js authentication with server-side sessions
```typescript
// Use library like NextAuth.js or implement proper JWT
// Store session on server, return secure HTTP-only cookie
```

---

## ⚠️ HIGH PRIORITY ISSUES

### 7. **XSS Vulnerability in Output**
**File:** Multiple PHP files  
**Problem:**
```php
<?php echo htmlspecialchars($error); ?>  // Good
<?php echo $customer['first_name']; ?>   // Missing escaping!
```

**Risk:** Stored/reflected XSS attacks  
**Fix:** Always escape output
```php
<?php echo htmlspecialchars($customer['first_name'], ENT_QUOTES); ?>
```

---

### 8. **Deprecated MySQL Extension Usage**
**File:** `staff/includes/db.php`  
**Problem:** Uses `mysqli_` functions (OK but procedural)
**Better:** Use prepared statements with parameterized queries consistently  
**Fix:** Switch to Object-Oriented MySQLi or use PDO

---

### 9. **No Input Validation for Business Logic**
**File:** `staff/order_create.php`  
**Problem:**
```php
$pickup_date = clean_input($_POST['pickup_date']);
// No validation that date is in future
// No validation that amount is positive
// No validation of relationships (customer exists?)
```

**Risk:** Invalid orders, negative amounts, orphaned records  
**Fix:** Add validation logic
```php
if (strtotime($pickup_date) <= time()) {
    die('Pickup date must be in the future');
}
```

---

### 10. **Hardcoded Database Credentials**
**File:** `staff/includes/db.php`  
**Problem:**
```php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';  // Empty password for root
```

**Risk:** Database easily compromised; credentials in version control  
**Fix:** Use environment variables
```php
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') ?: '';
```

---

### 11. **No Role-Based Access Control in PHP**
**File:** `staff/manager/dashboard.php`, `staff/baker/dashboard.php`, etc.  
**Problem:** Role routing exists but no per-endpoint verification
```php
// Each file should verify user has correct role
if ($_SESSION['user_role'] !== 'manager') {
    die('Unauthorized');
}
```

---

## 📋 MEDIUM PRIORITY ISSUES

### 12. **Inconsistent Error Handling**
**File:** Throughout PHP backend  
**Problem:** Mix of error handling approaches
- Some files use `mysqli_error($conn)`
- Some use silent failures
- Some redirect without messages

**Fix:** Implement consistent error handling pattern

---

### 13. **Missing Database Foreign Key Constraints**
**File:** `database-schema.sql`  
**Problem:**
```sql
FOREIGN KEY (customer_id) REFERENCES customers(id)
// No ON DELETE CASCADE or ON UPDATE CASCADE
```

**Risk:** Orphaned orders if customer deleted  
**Fix:** Add cascade rules
```sql
FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
```

---

### 14. **No Email Validation for Customer Records**
**File:** `staff/customer_form.php`  
**Problem:** Email field accepts any input without validation

**Fix:** Add server-side email validation
```php
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email format');
}
```

---

### 15. **TypeScript `any` Types Used**
**File:** `lib/mock-data.ts`, `lib/utils.ts`  
**Problem:** Some files may use loose typing

**Fix:** Ensure strict TypeScript configuration in `tsconfig.json`
```json
{
  "compilerOptions": {
    "noImplicitAny": true,
    "strict": true
  }
}
```

---

## 🔍 LOW PRIORITY ISSUES

### 16. **Missing Form ENCTYPE Attribute**
**File:** `staff/order_create.php`  
**Problem:**
```php
<form method="POST" action="" id="orderForm">
// Missing enctype="multipart/form-data" if file uploads planned
```

---

### 17. **Incomplete Navbar Customization**
**File:** `staff/includes/header.php`  
**Problem:** References undefined variables
```php
<title><?php echo $pageTitle ?? 'Staff Dashboard'; ?></title>
// $pageTitle not always set before include
```

**Fix:** Ensure variable is set before header inclusion
```php
<?php
$pageTitle = 'Create Order';
include 'includes/header.php';
?>
```

---

### 18. **Mixed Authentication Approaches**
**File:** Project-wide  
**Problem:** 
- PHP uses session-based auth
- Next.js uses localStorage
- No integration between systems

**Note:** These appear to be separate systems. If they need to work together, choose one authentication method.

---

## ✅ WORKING FEATURES

### Positive Aspects:
- ✅ Clean HTML structure in public website
- ✅ Responsive design with Bootstrap 5
- ✅ Good UI/UX with themed colors
- ✅ Comprehensive cake customization options
- ✅ Database schema is well-designed (with proper indexes, enums, timestamps)
- ✅ Multiple role support (manager, sales, baker, decorator, accountant)
- ✅ Good code organization with includes
- ✅ Form validation on client-side (HTML5)

---

## 🛠️ RECOMMENDED FIXES (Priority Order)

### Phase 1: Critical (Do First)
1. Implement parameterized SQL queries with prepared statements
2. Add password hashing and remove plain text passwords
3. Add authentication checks to all protected pages
4. Implement CSRF tokens on all forms
5. Switch to HTTP-only secure cookies for sessions

### Phase 2: High (Do Soon)
6. Standardize session key names across all files
7. Add XSS protection with proper output escaping
8. Implement input validation for business logic
9. Use environment variables for database credentials
10. Add role-based authorization checks in endpoints

### Phase 3: Medium (Do Eventually)
11. Implement consistent error handling
12. Add database cascade constraints
13. Add email validation
14. Ensure TypeScript strict mode
15. Fix navbar variable initialization

### Phase 4: Low (Nice to Have)
16. Add form enctype attributes
17. Clean up header.php variable handling
18. Decide on unified authentication (PHP or Next.js)

---

## 📊 Quick Reference: File Security Status

| File | Security Level | Top Issue |
|------|---|---|
| `staff/login.php` | 🔴 Critical | Plain text passwords |
| `staff/order_create.php` | 🔴 Critical | SQL injection + no auth check |
| `staff/includes/db.php` | 🟠 High | Hardcoded credentials |
| `app/login/page.tsx` | 🔴 Critical | Client-side auth only |
| `app/layout.tsx` | 🟢 Good | No issues found |
| `index.html` | 🟢 Good | No security issues |
| HTML Public Pages | 🟢 Good | No security issues |

---

## 🎯 Testing Recommendations

1. **Security Testing:**
   - Test SQL injection with `' OR '1'='1` in customer ID
   - Try accessing `/staff/orders.php` without logging in
   - Try modifying localStorage user role and accessing other dashboards

2. **Integration Testing:**
   - Verify CSRF token validation works
   - Test form submissions with invalid data
   - Test role-based access control

3. **Database Testing:**
   - Verify foreign key constraints work
   - Test cascade delete behavior
   - Validate stored procedures (if any)

---

## 📞 Questions to Clarify

1. Is this a student project (as noted in README)? If so, some issues may be intentional learning examples.
2. Do the PHP backend and Next.js frontend need to work together, or are they separate?
3. What authentication library preference (NextAuth.js, Passport, custom)?
4. Is this for production use or educational purposes?

---

**Report Generated:** November 21, 2025  
**Total Issues Found:** 18 (6 Critical, 5 High, 4 Medium, 3 Low)
