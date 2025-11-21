"use client"

import type React from "react"

import { useState } from "react"
import { useRouter } from "next/navigation"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { Checkbox } from "@/components/ui/checkbox"
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import { authenticateUser } from "@/lib/auth"
import { useToast } from "@/hooks/use-toast"
import { Cake } from "lucide-react"
import Link from "next/link"

export default function LoginPage() {
  const [email, setEmail] = useState("")
  const [password, setPassword] = useState("")
  const [rememberMe, setRememberMe] = useState(false)
  const [isLoading, setIsLoading] = useState(false)
  const router = useRouter()
  const { toast } = useToast()

  const handleLogin = async (e: React.FormEvent) => {
    e.preventDefault()
    setIsLoading(true)

    // Simulate API delay
    await new Promise((resolve) => setTimeout(resolve, 500))

    const user = authenticateUser(email, password)

    if (user) {
      // Store in localStorage (mock session)
      localStorage.setItem("user", JSON.stringify(user))

      // Handle remember me
      if (rememberMe) {
        document.cookie = `rememberedEmail=${email}; max-age=${60 * 60 * 24 * 30}; path=/`
      }

      toast({
        title: "Login Successful",
        description: `Welcome back, ${user.name}!`,
      })

      // Redirect based on role
      setTimeout(() => {
        router.push(`/dashboard/${user.role}`)
      }, 500)
    } else {
      toast({
        variant: "destructive",
        title: "Login Failed",
        description: "Invalid email or password. Please try again.",
      })
      setIsLoading(false)
    }
  }

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
          <p className="text-lg" style={{ color: "#C44569", fontFamily: "Poppins, sans-serif" }}>
            Staff Portal
          </p>
        </div>

        {/* Login Card */}
        <Card className="shadow-lg border-2" style={{ borderColor: "#C44569" }}>
          <CardHeader>
            <CardTitle style={{ fontFamily: "Poppins, sans-serif", color: "#2B2B2B" }}>Sign In</CardTitle>
            <CardDescription style={{ fontFamily: "Open Sans, sans-serif" }}>
              Enter your credentials to access the staff portal
            </CardDescription>
          </CardHeader>
          <CardContent>
            <form onSubmit={handleLogin} className="space-y-4">
              <div className="space-y-2">
                <Label htmlFor="email" style={{ fontFamily: "Poppins, sans-serif" }}>
                  Email
                </Label>
                <Input
                  id="email"
                  type="email"
                  placeholder="your.email@emilybakes.com"
                  value={email}
                  onChange={(e) => setEmail(e.target.value)}
                  required
                  style={{ fontFamily: "Open Sans, sans-serif" }}
                />
              </div>

              <div className="space-y-2">
                <Label htmlFor="password" style={{ fontFamily: "Poppins, sans-serif" }}>
                  Password
                </Label>
                <Input
                  id="password"
                  type="password"
                  placeholder="Enter your password"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                  required
                  style={{ fontFamily: "Open Sans, sans-serif" }}
                />
              </div>

              <div className="flex items-center justify-between">
                <div className="flex items-center space-x-2">
                  <Checkbox
                    id="remember"
                    checked={rememberMe}
                    onCheckedChange={(checked) => setRememberMe(checked as boolean)}
                  />
                  <Label
                    htmlFor="remember"
                    className="text-sm cursor-pointer"
                    style={{ fontFamily: "Open Sans, sans-serif" }}
                  >
                    Remember me
                  </Label>
                </div>
                <Link
                  href="/forgot-password"
                  className="text-sm hover:underline"
                  style={{ color: "#C44569", fontFamily: "Open Sans, sans-serif" }}
                >
                  Forgot password?
                </Link>
              </div>

              <Button
                type="submit"
                className="w-full text-white"
                disabled={isLoading}
                style={{ backgroundColor: "#C44569", fontFamily: "Poppins, sans-serif" }}
              >
                {isLoading ? "Signing in..." : "Sign In"}
              </Button>
            </form>

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
