"use client"

import type React from "react"

import { useEffect, useState } from "react"
import { useRouter } from "next/navigation"
import type { User } from "@/lib/auth"
import { Button } from "@/components/ui/button"
import { Cake, LogOut } from "lucide-react"
import { useToast } from "@/hooks/use-toast"

interface DashboardLayoutProps {
  children: React.ReactNode
  role: string
}

export function DashboardLayout({ children, role }: DashboardLayoutProps) {
  const [user, setUser] = useState<User | null>(null)
  const router = useRouter()
  const { toast } = useToast()

  useEffect(() => {
    const storedUser = localStorage.getItem("user")
    if (!storedUser) {
      router.push("/login")
      return
    }

    const parsedUser = JSON.parse(storedUser) as User

    // Verify role matches
    if (parsedUser.role !== role) {
      router.push(`/dashboard/${parsedUser.role}`)
      return
    }

    setUser(parsedUser)
  }, [role, router])

  const handleLogout = () => {
    localStorage.removeItem("user")
    toast({
      title: "Logged Out",
      description: "You have been successfully logged out.",
    })
    router.push("/login")
  }

  if (!user) {
    return null // Loading state
  }

  const roleColors = {
    manager: "#C44569",
    sales: "#6C63FF",
    baker: "#FF9F43",
    decorator: "#F368E0",
    accountant: "#10AC84",
  }

  const roleColor = roleColors[user.role as keyof typeof roleColors] || "#C44569"

  return (
    <div className="min-h-screen" style={{ backgroundColor: "#F8EBD7" }}>
      {/* Navigation Bar */}
      <nav className="border-b-2 shadow-sm" style={{ backgroundColor: "#FFFFFF", borderColor: "#C44569" }}>
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-16">
            <div className="flex items-center gap-3">
              <Cake className="w-8 h-8" style={{ color: "#C44569" }} />
              <div>
                <h1 className="text-xl font-bold" style={{ fontFamily: "Playfair Display, serif", color: "#2B2B2B" }}>
                  Emily Bakes Cakes
                </h1>
                <p className="text-xs" style={{ fontFamily: "Open Sans, sans-serif", color: "#2B2B2B" }}>
                  Staff Portal
                </p>
              </div>
            </div>

            <div className="flex items-center gap-4">
              <div className="text-right">
                <p className="text-sm font-semibold" style={{ fontFamily: "Poppins, sans-serif", color: "#2B2B2B" }}>
                  {user.name}
                </p>
                <span
                  className="text-xs px-2 py-1 rounded-full text-white"
                  style={{ backgroundColor: roleColor, fontFamily: "Open Sans, sans-serif" }}
                >
                  {user.role.charAt(0).toUpperCase() + user.role.slice(1)}
                </span>
              </div>
              <Button
                variant="outline"
                size="sm"
                onClick={handleLogout}
                style={{ borderColor: "#C44569", color: "#C44569", fontFamily: "Poppins, sans-serif" }}
              >
                <LogOut className="w-4 h-4 mr-2" />
                Logout
              </Button>
            </div>
          </div>
        </div>
      </nav>

      {/* Main Content */}
      <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">{children}</main>
    </div>
  )
}
