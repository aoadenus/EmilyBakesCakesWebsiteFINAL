import Link from 'next/link'

export default function ForgotPasswordPage() {
  return (
    <div style={{ minHeight: '100vh', display: 'flex', alignItems: 'center', justifyContent: 'center', padding: '1rem', backgroundColor: '#F8EBD7' }}>
      <div style={{ width: '100%', maxWidth: '28rem' }}>
        {/* Logo/Header */}
        <div style={{ textAlign: 'center', marginBottom: '2rem' }}>
          <div style={{ fontSize: '3rem', marginBottom: '1rem' }}>🎂</div>
          <h1 style={{ fontSize: '2.25rem', fontWeight: 'bold', marginBottom: '0.5rem', fontFamily: 'Playfair Display, serif', color: '#2B2B2B' }}>
            Emily Bakes Cakes
          </h1>
        </div>

        {/* Password Reset Card */}
        <div style={{ boxShadow: '0 10px 15px -3px rgba(0, 0, 0, 0.1)', border: '2px solid #C44569', borderRadius: '0.5rem', padding: '1.5rem', backgroundColor: '#fff' }}>
          <h2 style={{ fontSize: '1.5rem', fontWeight: 'bold', marginBottom: '0.5rem', fontFamily: 'Poppins, sans-serif', color: '#2B2B2B' }}>Password Reset</h2>
          <p style={{ fontSize: '0.875rem', color: '#666', marginBottom: '1.5rem', fontFamily: 'Open Sans, sans-serif' }}>
            Password recovery is managed by our IT partner
          </p>

          <div style={{ padding: '1.5rem', borderRadius: '0.5rem', backgroundColor: '#F8EBD7', textAlign: 'center', marginBottom: '1.5rem' }}>
            <p style={{ fontSize: '1.125rem', fontWeight: '600', marginBottom: '0.5rem', fontFamily: 'Poppins, sans-serif', color: '#2B2B2B' }}>
              Password Reset Handled By
            </p>
            <p style={{ fontSize: '1.5rem', fontWeight: 'bold', marginBottom: '1rem', fontFamily: 'Playfair Display, serif', color: '#C44569' }}>
              Averium Solutions
            </p>
            <p style={{ fontSize: '0.875rem', marginBottom: '1rem', color: '#666', fontFamily: 'Open Sans, sans-serif' }}>
              Contact them for password recovery assistance
            </p>
          </div>

          <div style={{ display: 'flex', flexDirection: 'column', gap: '0.75rem' }}>
            <div>
              <p style={{ fontSize: '0.875rem', fontWeight: '600', marginBottom: '0.25rem', fontFamily: 'Poppins, sans-serif', color: '#2B2B2B' }}>📧 Email</p>
              <a href="mailto:support@averium.com" style={{ color: '#C44569', textDecoration: 'none', fontSize: '0.875rem', fontFamily: 'Open Sans, sans-serif' }}>
                support@averium.com
              </a>
            </div>
            <div>
              <p style={{ fontSize: '0.875rem', fontWeight: '600', marginBottom: '0.25rem', fontFamily: 'Poppins, sans-serif', color: '#2B2B2B' }}>📞 Phone</p>
              <a href="tel:+1234567890" style={{ color: '#C44569', textDecoration: 'none', fontSize: '0.875rem', fontFamily: 'Open Sans, sans-serif' }}>
                +1 (234) 567-890
              </a>
            </div>
          </div>

          <Link
            href="/login"
            style={{ display: 'block', marginTop: '1.5rem', padding: '0.75rem', backgroundColor: '#C44569', color: 'white', textDecoration: 'none', borderRadius: '0.375rem', textAlign: 'center', fontFamily: 'Poppins, sans-serif', fontWeight: '600' }}
          >
            ← Back to Login
          </Link>
        </div>
      </div>
    </div>
  )
}
              </p>
              <p className="text-sm mb-4" style={{ fontFamily: "Open Sans, sans-serif", color: "#2B2B2B" }}>
                Please contact our IT support team to reset your password securely.
              </p>

              <Dialog open={showContactModal} onOpenChange={setShowContactModal}>
                <DialogTrigger asChild>
                  <Button
                    className="w-full text-white"
                    style={{ backgroundColor: "#C44569", fontFamily: "Poppins, sans-serif" }}
                  >
                    Contact Support
                  </Button>
                </DialogTrigger>
                <DialogContent>
                  <DialogHeader>
                    <DialogTitle style={{ fontFamily: "Poppins, sans-serif", color: "#2B2B2B" }}>
                      Averium Solutions Contact
                    </DialogTitle>
                    <DialogDescription style={{ fontFamily: "Open Sans, sans-serif" }}>
                      Reach out to our IT support team for password assistance
                    </DialogDescription>
                  </DialogHeader>
                  <div className="space-y-4 py-4">
                    <div className="flex items-center gap-3">
                      <Mail className="w-5 h-5" style={{ color: "#C44569" }} />
                      <div>
                        <p
                          className="text-sm font-semibold"
                          style={{ fontFamily: "Poppins, sans-serif", color: "#2B2B2B" }}
                        >
                          Email Support
                        </p>
                        <p className="text-sm" style={{ fontFamily: "Open Sans, sans-serif", color: "#2B2B2B" }}>
                          support@averiumsolutions.com
                        </p>
                      </div>
                    </div>
                    <div className="flex items-center gap-3">
                      <Phone className="w-5 h-5" style={{ color: "#C44569" }} />
                      <div>
                        <p
                          className="text-sm font-semibold"
                          style={{ fontFamily: "Poppins, sans-serif", color: "#2B2B2B" }}
                        >
                          Phone Support
                        </p>
                        <p className="text-sm" style={{ fontFamily: "Open Sans, sans-serif", color: "#2B2B2B" }}>
                          (713) 555-TECH (8324)
                        </p>
                      </div>
                    </div>
                    <div className="p-3 rounded-lg mt-4" style={{ backgroundColor: "#F8EBD7" }}>
                      <p className="text-xs" style={{ fontFamily: "Open Sans, sans-serif", color: "#2B2B2B" }}>
                        Support Hours: Monday - Friday, 8:00 AM - 6:00 PM CST
                      </p>
                    </div>
                  </div>
                </DialogContent>
              </Dialog>
            </div>

            <Link href="/login">
              <Button variant="outline" className="w-full bg-transparent" style={{ fontFamily: "Poppins, sans-serif" }}>
                <ArrowLeft className="w-4 h-4 mr-2" />
                Back to Login
              </Button>
            </Link>
          </CardContent>
        </Card>
      </div>
    </div>
  )
}
