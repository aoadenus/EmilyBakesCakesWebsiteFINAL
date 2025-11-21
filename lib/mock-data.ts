// Mock data for the entire application
export interface Customer {
  id: string
  name: string
  email: string
  phone: string
  type: "retail" | "corporate"
  totalOrders: number
  lastOrderDate: string
  isPreferred: boolean
}

export interface Order {
  id: string
  customerId: string
  customerName: string
  productType: string
  cakeType?: string
  size?: string
  layers?: number
  filling?: string
  icing?: string
  decorations?: string[]
  instructions?: string
  price: number
  deposit: number
  status: "pending" | "baking" | "decorating" | "ready" | "completed" | "cancelled"
  orderDate: string
  pickupDate: string
  pickupTime: string
  createdBy: string
  lastModifiedBy: string
}

export interface Product {
  id: string
  name: string
  category: string
  basePrice: number
  image?: string
}

// Mock Customers
export const MOCK_CUSTOMERS: Customer[] = [
  {
    id: "C001",
    name: "Jennifer Smith",
    email: "jennifer.smith@email.com",
    phone: "(713) 555-0101",
    type: "retail",
    totalOrders: 12,
    lastOrderDate: "2025-01-15",
    isPreferred: true,
  },
  {
    id: "C002",
    name: "Michael Johnson",
    email: "michael.j@email.com",
    phone: "(713) 555-0102",
    type: "retail",
    totalOrders: 5,
    lastOrderDate: "2025-01-10",
    isPreferred: false,
  },
  {
    id: "C003",
    name: "Acme Corporation",
    email: "events@acme.com",
    phone: "(713) 555-0200",
    type: "corporate",
    totalOrders: 28,
    lastOrderDate: "2025-01-18",
    isPreferred: true,
  },
  {
    id: "C004",
    name: "Sarah Williams",
    email: "sarah.w@email.com",
    phone: "(713) 555-0103",
    type: "retail",
    totalOrders: 3,
    lastOrderDate: "2024-12-20",
    isPreferred: false,
  },
  {
    id: "C005",
    name: "Houston Medical Center",
    email: "catering@hmc.com",
    phone: "(713) 555-0201",
    type: "corporate",
    totalOrders: 45,
    lastOrderDate: "2025-01-19",
    isPreferred: true,
  },
]

// Mock Orders
export const MOCK_ORDERS: Order[] = [
  {
    id: "ORD-2025-001",
    customerId: "C001",
    customerName: "Jennifer Smith",
    productType: "cake",
    cakeType: "Birthday Celebration",
    size: "8-inch Round Double Layer",
    layers: 2,
    filling: "Strawberry Mousse",
    icing: "White Buttercream",
    decorations: ["Buttercream Flowers", "Ribbons (Pink)"],
    instructions: 'Write "Happy Birthday Sarah" in pink',
    price: 45,
    deposit: 22.5,
    status: "ready",
    orderDate: "2025-01-18",
    pickupDate: "2025-01-21",
    pickupTime: "14:00",
    createdBy: "Sarah Johnson",
    lastModifiedBy: "Lisa Martinez",
  },
  {
    id: "ORD-2025-002",
    customerId: "C003",
    customerName: "Acme Corporation",
    productType: "cake",
    cakeType: "Chocolate Ganache",
    size: "Full Sheet Double Layer",
    layers: 2,
    filling: "Chocolate Mousse",
    icing: "Chocolate Ganache",
    decorations: ["Fondant Decorations", "Company Logo (Edible Photo)"],
    instructions: 'Corporate logo in center, "Congratulations Team!" below',
    price: 280,
    deposit: 140,
    status: "decorating",
    orderDate: "2025-01-17",
    pickupDate: "2025-01-21",
    pickupTime: "10:00",
    createdBy: "Sarah Johnson",
    lastModifiedBy: "Lisa Martinez",
  },
  {
    id: "ORD-2025-003",
    customerId: "C002",
    customerName: "Michael Johnson",
    productType: "cake",
    cakeType: "Lemon Doberge",
    size: "10-inch Round Double Layer",
    layers: 2,
    filling: "Lemon Curd",
    icing: "White Buttercream",
    decorations: ["Silk Flowers (Lily)", "Ribbons (Yellow)"],
    instructions: "Simple and elegant",
    price: 75,
    deposit: 37.5,
    status: "baking",
    orderDate: "2025-01-19",
    pickupDate: "2025-01-22",
    pickupTime: "16:00",
    createdBy: "Sarah Johnson",
    lastModifiedBy: "Mike Chen",
  },
]

// Product Options
export const CAKE_TYPES = [
  "Birthday Celebration",
  "Almond Delight",
  "Lemon and Cream Cheese",
  "Black Forest",
  "German Chocolate Cream Cheese",
  "Chocolate Ganache",
  "Italian Cream",
  "Lemon Doberge",
  "Chocolate Doberge",
  "½ & ½ Doberge Cake",
  "Pecan Praline Cream Cheese",
  "Chocolate Banana",
  "Strawberry Delight",
  "Cookies and Cream",
]

export const CAKE_FLAVORS = ["Vanilla", "Almond", "Yellow", "Devil's Food Chocolate", "Chocolate", "Strawberry"]

export const FILLING_FLAVORS = [
  "White Buttercream",
  "Chocolate Buttercream",
  "Almond Buttercream",
  "Cream Cheese",
  "Lemon Curd",
  "Strawberry",
  "Rum/Strawberry",
  "Raspberry",
  "Pecan Praline",
  "Chocolate Mousse",
  "Lemon Mousse",
  "Strawberry Mousse",
  "Raspberry Mousse",
  "White Chocolate Mousse",
  "Mango Mousse",
]

export const ICING_FLAVORS = [
  "White Buttercream",
  "Chocolate Buttercream",
  "Almond Buttercream",
  "White Chocolate Buttercream",
  "Cream Cheese",
  "Chocolate Ganache",
]

export const CAKE_SIZES = [
  { name: "6-inch Round Double Layer", serves: "4-6", price: 20 },
  { name: "8-inch Round Double Layer", serves: "12-15", price: 30 },
  { name: "10-inch Round Double Layer", serves: "25-30", price: 60 },
  { name: "12-inch Round Double Layer", serves: "35", price: 100 },
  { name: "14-inch Round Double Layer", serves: "40", price: 140 },
  { name: "16-inch Round Double Layer", serves: "85", price: 180 },
  { name: "¼ Sheet Double Layer", serves: "15-20", price: 40 },
  { name: "½ Sheet Double Layer", serves: "30-50", price: 100 },
  { name: "Full Sheet Double Layer", serves: "90-100", price: 200 },
]

export const DECORATIONS = [
  "Buttercream Flowers",
  "Fondant Decorations",
  "Silk Flowers (Iris)",
  "Silk Flowers (Rose)",
  "Silk Flowers (Daisy)",
  "Silk Flowers (Lily)",
  "Silk Butterflies",
  "Edible Sugar-Based Photos",
  "Toy Trains",
  "Plastic Dinosaurs",
  "Various Dolls",
  "Construction Toys",
  "Plastic Deer/Squirrels/Rabbits",
  "Camping Tent/Fire",
  "Race Cars",
  "Plastic Ballet Slippers",
  "Plastic Baby Rattles",
  "Plastic Baby Bottle",
  "Plastic Fish",
  "Plastic Pine Trees",
  "Plastic Palm Trees",
  "Fleur-de-Lis Pics",
  "Rock Candy",
  "Plastic Graduation Cap",
  "Plastic Balloons",
  "Plastic Firework Explosions",
  "Ribbons (Red)",
  "Ribbons (Blue)",
  "Ribbons (Pink)",
  "Ribbons (Purple)",
  "Ribbons (Gold)",
  "Ribbons (Silver)",
  "Ribbons (Yellow)",
  "Ribbons (White)",
  "Ribbons (Green)",
  "Ribbons (Black)",
  "Plastic Star Explosion Insert",
  "Paper Parasols",
  "Plastic Pics (Flamingos)",
  "Plastic Pics (Fish)",
  "Plastic Pics (Mermaids)",
  "Plastic Pics (Flip Flops)",
  "Plastic Pics (Seashells)",
  "Flags (US)",
  "Flags (Canada)",
  "Flags (Mexico)",
  "Plastic Sports Equipment",
  "Rainbows",
]
