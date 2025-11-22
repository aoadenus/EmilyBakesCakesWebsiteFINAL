import Link from 'next/link'

export default function LoginPage() {
  return (
    <div style={{ minHeight: '100vh', display: 'flex', alignItems: 'center', justifyContent: 'center', padding: '1rem', backgroundColor: '#F8EBD7' }}>
      <div style={{ width: '100%', maxWidth: '28rem' }}>
        {/* Logo/Header */}
        <div style={{ textAlign: 'center', marginBottom: '2rem' }}>
          <div style={{ fontSize: '3rem', marginBottom: '1rem' }}>🎂</div>
          <h1 style={{ fontSize: '2.25rem', fontWeight: 'bold', marginBottom: '0.5rem', fontFamily: 'Playfair Display, serif', color: '#2B2B2B' }}>
            Emily Bakes Cakes
          </h1>
          <p style={{ fontSize: '1.125rem', color: '#C44569', fontFamily: 'Poppins, sans-serif' }}>
            Staff Portal
          </p>
        </div>

        {/* Login Card */}
        <div style={{ boxShadow: '0 10px 15px -3px rgba(0, 0, 0, 0.1)', border: '2px solid #C44569', borderRadius: '0.5rem', padding: '1.5rem', backgroundColor: '#fff' }}>
          <h2 style={{ fontSize: '1.5rem', fontWeight: 'bold', marginBottom: '0.5rem', fontFamily: 'Poppins, sans-serif', color: '#2B2B2B' }}>Sign In</h2>
          <p style={{ fontSize: '0.875rem', color: '#666', marginBottom: '1.5rem', fontFamily: 'Open Sans, sans-serif' }}>
            Enter your credentials to access the staff portal
          </p>

          <form action="/api/login" method="POST" style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
            <div>
              <label htmlFor="email" style={{ fontFamily: 'Poppins, sans-serif', display: 'block', marginBottom: '0.5rem', fontWeight: '500' }}>
                Email
              </label>
              <input
                id="email"
                name="email"
                type="email"
                placeholder="your.email@emilybakes.com"
                required
                style={{ width: '100%', padding: '0.5rem 0.75rem', border: '1px solid #ddd', borderRadius: '0.375rem', fontFamily: 'Open Sans, sans-serif' }}
              />
            </div>

            <div>
              <label htmlFor="password" style={{ fontFamily: 'Poppins, sans-serif', display: 'block', marginBottom: '0.5rem', fontWeight: '500' }}>
                Password
              </label>
              <input
                id="password"
                name="password"
                type="password"
                placeholder="Enter your password"
                required
                style={{ width: '100%', padding: '0.5rem 0.75rem', border: '1px solid #ddd', borderRadius: '0.375rem', fontFamily: 'Open Sans, sans-serif' }}
              />
            </div>

            <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
              <div style={{ display: 'flex', alignItems: 'center', gap: '0.5rem' }}>
                <input
                  id="remember"
                  name="remember"
                  type="checkbox"
                  style={{ width: '1rem', height: '1rem' }}
                />
                <label htmlFor="remember" style={{ fontSize: '0.875rem', cursor: 'pointer', fontFamily: 'Open Sans, sans-serif' }}>
                  Remember me
                </label>
              </div>
              <Link
                href="/forgot-password"
                style={{ fontSize: '0.875rem', color: '#C44569', textDecoration: 'none' }}
                onMouseEnter={(e) => (e.currentTarget.style.textDecoration = 'underline')}
                onMouseLeave={(e) => (e.currentTarget.style.textDecoration = 'none')}
              >
                Forgot password?
              </Link>
            </div>

            <button
              type="submit"
              style={{ width: '100%', backgroundColor: '#C44569', color: 'white', padding: '0.75rem', borderRadius: '0.375rem', border: 'none', fontFamily: 'Poppins, sans-serif', fontWeight: '600', cursor: 'pointer' }}
            >
              Sign In
            </button>
          </form>
        </div>
      </div>
    </div>
  )
}

            {/* Demo Accounts */}
            <div className="mt-6 p-4 rounded-lg" style={{ backgroundColor: "#F8EBD7" }}>
              <p className="text-sm font-semibold mb-2" style={{ fontFamily: "Poppins, sans-serif", color: "#2B2B2B" }}>
                Demo Accounts:
              </p>
              <div className="text-xs space-y-1" style={{ fontFamily: "Open Sans, sans-serif", color: "#2B2B2B" }}>
                <p>Manager: manager@emilybakes.com / manager123</p>
                <p>Sales: sales@emilybakes.com / sales123</p>
                <p>Baker: baker@emilybakes.com / baker123</p>
                <p>Decorator: decorator@emilybakes.com / decorator123</p>
                <p>Accountant: accountant@emilybakes.com / accountant123</p>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  )
}
