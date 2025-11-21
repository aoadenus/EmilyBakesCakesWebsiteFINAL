# Emily Bakes Cakes - Order Management System

## Overview

Emily Bakes Cakes is a staff-only internal order management system for a custom bakery. The application has **zero customer e-commerce capability** - all orders are entered manually by staff through an admin portal after receiving orders via phone, email, or in-person visits.

The system features a dual-interface architecture:
- **Public Website**: Marketing/informational site with no ordering functionality
- **Staff Portal**: Complete order management system with role-based access control

The application uses a "Vanilla Raspberry" design system with brand colors: Raspberry (#C44569), Cream (#F8EBD7), Charcoal (#2B2B2B), White (#FFFFFF), and Soft Gray (#E9E9E9).

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Frontend Architecture

**Framework**: React 18 with TypeScript, built using Vite for development and bundling.

**Routing Strategy**: Client-side routing with two distinct sections:
- Public routes (`/`, `/shop`, `/gallery`, `/about`, `/contact`) - Marketing pages with no ordering capability
- Staff routes (`/staff/*`) - Protected admin portal requiring authentication

**Design System Implementation**:
- Design tokens defined in `DESIGN_TOKENS_FINAL.json` with WCAG AA compliance
- Tailwind CSS configured with custom brand colors (raspberry, cream, charcoal)
- Typography hierarchy: Playfair Display (headings), Poppins (subheadings), Open Sans (body)
- Component library includes navigation, cards, forms, and data tables

**State Management**: The application uses a combination of:
- React hooks (useState, useEffect) for local component state
- Context API for authentication and user session management
- Direct database queries for data fetching (no global state management library)

**Key Architectural Decisions**:
- **No customer ordering flows**: Removed all "Custom Builder" and online ordering CTAs per TIER1-COMPLETION-LOG
- **Staff-first design**: All product and order management happens through authenticated staff portal
- **Role-based UI**: Different staff roles (Sales, Baker, Decorator, Accountant, Manager, Owner) see different features

### Backend Architecture

**Database Schema** (defined in `shared/schema.ts`):

The system uses Drizzle ORM with PostgreSQL (or compatible database) featuring:

1. **Products Table**: Stores standard cakes, flavors, fillings, icings with pricing
   - Soft delete support (deletedAt, deletedBy columns)
   - Popularity tracking and rating system
   - Category-based organization

2. **Employees Table**: Staff authentication and role management
   - Roles: sales, baker, decorator, accountant, manager, owner
   - Active/inactive status tracking
   - Password hash storage for security

3. **Customers Table**: Customer information with VIP tracking
   - Soft delete support
   - Order history aggregation (totalOrders, lastOrderDate)
   - Customer type enum (retail, corporate) for reporting

4. **Relational Design**: Uses Drizzle relations for foreign key management between orders, customers, employees, and products

**Data Layer Pattern**:
- Drizzle ORM for type-safe database queries
- Schema-first approach with TypeScript types generated from database schema
- Soft delete pattern throughout for data preservation

### Authentication & Authorization

**Authentication Strategy**:
- Session-based authentication for staff portal
- Password hashing for employee credentials
- Protected routes requiring valid session

**Authorization Model**:
- Role-based access control (RBAC) with 6 staff roles
- Different report access levels:
  - Sales, Baker, Decorator, Manager: Order Summary, Customer List
  - Accountant, Manager only: Revenue Report
  - Manager only: Full system access

### Reporting System

**Architecture Decision**: Using Recharts for data visualization (per TIER4-PROMPT requirements).

**Six Core Reports**:

1. **Order Summary Report**: Daily order tracking with bar charts
2. **Customer List Report**: Customer acquisition trends with line charts  
3. **Revenue Report**: Financial analytics with line, pie, and bar charts
4. **Production Schedule**: Baker/decorator workflow management
5. **Inventory Report**: Ingredient tracking
6. **Custom Report Builder**: Flexible data export tool

**Export Capabilities**: Multi-format exports (CSV, PDF) for all reports.

### Product Catalog Design

**Case Study Data Integration** (from TIER3-COMPLETION-LOG):

The system includes complete product hierarchies:
- 14 Standard Cakes with case study pricing
- 6 Cake Flavors
- 15 Filling Flavors  
- 6 Icing Flavors
- 9 Cake Sizes (6" to 16" rounds, quarter/half sheets, full sheets) with accurate pricing in cents
- 37 Icing Colors

**Dynamic Form Architecture**:
- Cascading dropdowns for cake customization
- Real-time price calculation
- Size-based pricing logic (prices stored in cents for precision)

### Legacy HTML/CSS Pages

The repository includes original static HTML pages (`index.html`, `about.html`, `contact.html`, `menu.html`) with:
- Pure CSS styling (`css/styles.css`)
- Vanilla JavaScript (`js/script.js`) for mobile menu and carousels
- These serve as design references for React migration

## External Dependencies

### Core Framework Dependencies
- **React 18**: Frontend UI framework
- **TypeScript**: Type safety and developer experience
- **Vite**: Build tool and development server
- **Tailwind CSS**: Utility-first CSS framework

### Database & ORM
- **Drizzle ORM**: Type-safe database toolkit
- **PostgreSQL**: Primary database (or compatible alternative via Drizzle adapters)
- **pg**: PostgreSQL client library

### UI & Visualization Libraries
- **Recharts**: Chart and data visualization library for reporting dashboard
- **React Router**: Client-side routing (implied from route structure)

### Fonts & Design Assets
- **Google Fonts**: Playfair Display, Poppins, Open Sans
- **Custom SVG Icons**: Logo and UI elements

### Development Tools
- **ESLint**: Code linting
- **Claude AI Permissions**: Git operations allowed per `.claude/settings.local.json`

### Image Assets
- Product images stored in `/public/images/products/` directory
- Recommended format: JPEG 400x400px, <100KB per image
- Fallback placeholder.svg for missing images

### Third-Party Service Integrations
None currently implemented. The system is self-contained with no external API dependencies, payment processors, or cloud services. All order management happens internally through staff portal.