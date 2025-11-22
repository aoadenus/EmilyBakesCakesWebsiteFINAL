export default function RoleDashboard({ params }: { params: Promise<{ role: string }> }) {
  const role = (params as any).role

  const dashboardConfig: Record<string, { title: string; icon: string; color: string }> = {
    manager: { title: 'Manager Dashboard', icon: '📊', color: '#2B2B2B' },
    sales: { title: 'Sales Dashboard', icon: '💰', color: '#C44569' },
    baker: { title: 'Baker Dashboard', icon: '🍰', color: '#C44569' },
    decorator: { title: 'Decorator Dashboard', icon: '🎨', color: '#C44569' },
    accountant: { title: 'Accountant Dashboard', icon: '📈', color: '#C44569' },
  }

  const config = dashboardConfig[role] || { title: 'Dashboard', icon: '📋', color: '#C44569' }

  return (
    <div style={{ minHeight: '100vh', backgroundColor: '#f5f5f5', fontFamily: 'Open Sans, sans-serif' }}>
      {/* Top Navigation */}
      <nav style={{ backgroundColor: '#2B2B2B', color: '#fff', padding: '1rem 2rem', display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
        <h1 style={{ fontSize: '1.5rem', fontFamily: 'Playfair Display, serif' }}>🎂 Emily Bakes Cakes</h1>
        <div style={{ display: 'flex', gap: '1rem', alignItems: 'center' }}>
          <span style={{ textTransform: 'capitalize' }}>{role}</span>
          <a href="/login" style={{ color: '#fff', textDecoration: 'none', padding: '0.5rem 1rem', backgroundColor: '#C44569', borderRadius: '0.375rem' }}>
            Logout
          </a>
        </div>
      </nav>

      {/* Main Content */}
      <div style={{ padding: '2rem' }}>
        <div style={{ display: 'flex', alignItems: 'center', gap: '1rem', marginBottom: '2rem' }}>
          <span style={{ fontSize: '2rem' }}>{config.icon}</span>
          <h1 style={{ fontSize: '2rem', fontFamily: 'Playfair Display, serif', color: '#2B2B2B' }}>{config.title}</h1>
        </div>

        {/* Dashboard Cards */}
        <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(250px, 1fr))', gap: '1.5rem', marginBottom: '2rem' }}>
          {/* KPI Cards */}
          {[
            { label: 'Total Orders', value: '156', icon: '📦' },
            { label: 'This Week', value: '42', icon: '📅' },
            { label: 'Pending', value: '8', icon: '⏳' },
            { label: 'Revenue', value: '$5,240', icon: '💵' },
          ].map((card, idx) => (
            <div
              key={idx}
              style={{
                backgroundColor: '#fff',
                padding: '1.5rem',
                borderRadius: '0.5rem',
                boxShadow: '0 1px 3px rgba(0,0,0,0.1)',
                border: `2px solid ${config.color}`,
              }}
            >
              <div style={{ fontSize: '2rem', marginBottom: '0.5rem' }}>{card.icon}</div>
              <div style={{ color: '#666', fontSize: '0.875rem', marginBottom: '0.5rem' }}>{card.label}</div>
              <div style={{ fontSize: '1.875rem', fontWeight: 'bold', color: '#2B2B2B' }}>{card.value}</div>
            </div>
          ))}
        </div>

        {/* Quick Actions */}
        <div style={{ backgroundColor: '#fff', padding: '1.5rem', borderRadius: '0.5rem', boxShadow: '0 1px 3px rgba(0,0,0,0.1)' }}>
          <h2 style={{ fontSize: '1.25rem', marginBottom: '1rem', fontFamily: 'Poppins, sans-serif', color: '#2B2B2B' }}>Quick Actions</h2>
          <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(200px, 1fr))', gap: '1rem' }}>
            {['View Orders', 'Create Order', 'View Customers', 'Generate Report'].map((action, idx) => (
              <button
                key={idx}
                style={{
                  padding: '0.75rem 1.5rem',
                  backgroundColor: config.color,
                  color: '#fff',
                  border: 'none',
                  borderRadius: '0.375rem',
                  cursor: 'pointer',
                  fontFamily: 'Poppins, sans-serif',
                  fontWeight: '600',
                }}
              >
                {action}
              </button>
            ))}
          </div>
        </div>
      </div>
    </div>
  )
}
