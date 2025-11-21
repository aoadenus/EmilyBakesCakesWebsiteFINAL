"use client"

import { use } from "react"
import { DashboardLayout } from "@/components/dashboard-layout"
import { ManagerDashboard } from "@/components/dashboards/manager-dashboard"
import { SalesDashboard } from "@/components/dashboards/sales-dashboard"
import { BakerDashboard } from "@/components/dashboards/baker-dashboard"
import { DecoratorDashboard } from "@/components/dashboards/decorator-dashboard"
import { AccountantDashboard } from "@/components/dashboards/accountant-dashboard"

export default function RoleDashboard({ params }: { params: Promise<{ role: string }> }) {
  const { role } = use(params)

  const renderDashboard = () => {
    switch (role) {
      case "manager":
        return <ManagerDashboard />
      case "sales":
        return <SalesDashboard />
      case "baker":
        return <BakerDashboard />
      case "decorator":
        return <DecoratorDashboard />
      case "accountant":
        return <AccountantDashboard />
      default:
        return <div>Invalid role</div>
    }
  }

  return <DashboardLayout role={role}>{renderDashboard()}</DashboardLayout>
}
