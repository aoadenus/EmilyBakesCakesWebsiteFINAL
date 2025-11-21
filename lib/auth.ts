// Mock authentication utilities
export interface User {
  id: string
  email: string
  password: string
  name: string
  role: "manager" | "sales" | "baker" | "decorator" | "accountant"
}

// Mock user database
export const MOCK_USERS: User[] = [
  {
    id: "1",
    email: "manager@emilybakes.com",
    password: "manager123",
    name: "Emily Boudreaux",
    role: "manager",
  },
  {
    id: "2",
    email: "sales@emilybakes.com",
    password: "sales123",
    name: "Sarah Johnson",
    role: "sales",
  },
  {
    id: "3",
    email: "baker@emilybakes.com",
    password: "baker123",
    name: "Mike Chen",
    role: "baker",
  },
  {
    id: "4",
    email: "decorator@emilybakes.com",
    password: "decorator123",
    name: "Lisa Martinez",
    role: "decorator",
  },
  {
    id: "5",
    email: "accountant@emilybakes.com",
    password: "accountant123",
    name: "Dan Boudreaux",
    role: "accountant",
  },
]

export function authenticateUser(email: string, password: string): User | null {
  const user = MOCK_USERS.find((u) => u.email === email && u.password === password)
  return user || null
}

export function getUserById(id: string): User | null {
  return MOCK_USERS.find((u) => u.id === id) || null
}
