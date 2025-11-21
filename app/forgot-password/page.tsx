"use client"

import { useState } from "react"
import { Button } from "@/components/ui/button"
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from "@/components/ui/dialog"
import { Cake, ArrowLeft, Mail, Phone } from "lucide-react"
import Link from "next/link"

export default function ForgotPasswordPage() {
  const [showContactModal, setShowContactModal] = useState(false)

  return (
    <div className="min-h-screen flex items-center justify-center p-4" style={{ backgroundColor: "#F8EBD7" }}>
      <div className="w-full max-w-md">
        {/* Logo/Header */}
        <div className="text-center mb-8">
          <div className="inline-flex items-center gap-2 mb-4">
            <Cake className="w-12 h-12" style={{ color: "#C44569" }} />
          </div>
          <h1 className="text-4xl font-bold mb-2" style={{ fontFamily: "Playfair Display, serif", color: "#2B2B2B" }}>
            Emily Bakes Cakes
          </h1>
        </div>

        {/* Forgot Password Card */}
        <Card className="shadow-lg border-2" style={{ borderColor: "#C44569" }}>
          <CardHeader>
            <CardTitle style={{ fontFamily: "Poppins, sans-serif", color: "#2B2B2B" }}>Password Reset</CardTitle>
            <CardDescription style={{ fontFamily: "Open Sans, sans-serif" }}>
              Password recovery is managed by our IT partner
            </CardDescription>
          </CardHeader>
          <CardContent className="space-y-4">
            <div className="p-6 rounded-lg text-center" style={{ backgroundColor: "#F8EBD7" }}>
              <p className="text-lg font-semibold mb-2" style={{ fontFamily: "Poppins, sans-serif", color: "#2B2B2B" }}>
                Password Reset Handled By
              </p>
              <p
                className="text-2xl font-bold mb-4"
                style={{ fontFamily: "Playfair Display, serif", color: "#C44569" }}
              >
                Averium Solutions
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
