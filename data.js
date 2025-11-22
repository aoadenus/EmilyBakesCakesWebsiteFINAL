// ============================================================================
// EMILY BAKES CAKES - MOCK DATA
// ============================================================================

const mockData = {
  // Menu Items
  standardCakes: [
    {
      id: 1,
      name: "Birthday Celebration",
      description: "Classic yellow cake with white buttercream",
      price: 30,
      image: "public/ebc-cake-images/Birthday.png"
    },
    {
      id: 2,
      name: "Almond Delight",
      description: "Rich almond cake with almond buttercream",
      price: 35,
      image: "public/ebc-cake-images/almondelight.jpg"
    },
    {
      id: 3,
      name: "Lemon & Cream Cheese",
      description: "Tangy lemon cake with cream cheese icing",
      price: 35,
      image: "public/ebc-cake-images/lemoncreamcheese.jpg"
    },
    {
      id: 4,
      name: "Black Forest",
      description: "Chocolate cake with cherry filling",
      price: 40,
      image: "public/ebc-cake-images/blackforest.jpg"
    },
    {
      id: 5,
      name: "German Chocolate",
      description: "Rich chocolate with pecan praline filling",
      price: 38,
      image: "public/ebc-cake-images/germanchocolate.jpg"
    },
    {
      id: 6,
      name: "Cream Cheese Chocolate",
      description: "Decadent chocolate with cream cheese frosting",
      price: 38,
      image: "public/ebc-cake-images/creamcheesecho.jpg"
    },
    {
      id: 7,
      name: "Chocolate Ganache",
      description: "Silky chocolate ganache with chocolate cake",
      price: 40,
      image: "public/ebc-cake-images/chocganache.jpg"
    },
    {
      id: 8,
      name: "Strawberry Delight",
      description: "Fresh strawberry cake with cream filling",
      price: 38,
      image: "public/ebc-cake-images/strawberrydelight.jpg"
    },
    {
      id: 9,
      name: "Chocolate Banana",
      description: "Moist chocolate cake with banana mousse",
      price: 35,
      image: "public/ebc-cake-images/chocobanana.jpg"
    },
    {
      id: 10,
      name: "Chocolate Doberge",
      description: "Multi-layered chocolate cake with mousse",
      price: 45,
      image: "public/ebc-cake-images/chocolate doberge.jpg"
    },
    {
      id: 11,
      name: "Italian Cream",
      description: "Light vanilla with cream cheese and pecans",
      price: 40,
      image: "public/ebc-cake-images/italiancream.jpg"
    },
    {
      id: 12,
      name: "Lemon Doberge",
      description: "Multi-layered lemon cake with lemon mousse",
      price: 45,
      image: "public/ebc-cake-images/lemondoberge.jpg"
    },
    {
      id: 13,
      name: "Lemon Chocolate Doberge",
      description: "Alternating lemon and chocolate layers",
      price: 45,
      image: "public/ebc-cake-images/lemonchocolatedoberge.jpg"
    },
    {
      id: 14,
      name: "Cookies and Cream",
      description: "Vanilla cake with cookies and cream filling",
      price: 40,
      image: "public/ebc-cake-images/cookies and cream.jpg"
    },
    {
      id: 15,
      name: "Pecan Praline",
      description: "Buttery cake with pecan praline filling",
      price: 40,
      image: "public/ebc-cake-images/pecan praline.jpg"
    }
  ],

  cakeFlavors: [
    { name: "Vanilla", description: "Classic vanilla flavor, timeless and elegant" },
    { name: "Almond", description: "Delicate almond with subtle nutty sweetness" },
    { name: "Yellow", description: "Traditional yellow cake, buttery and moist" },
    { name: "Devil's Food Chocolate", description: "Deep, rich dark chocolate with intense cocoa" },
    { name: "Chocolate", description: "Classic chocolate, rich and indulgent" },
    { name: "Strawberry", description: "Light strawberry flavor with fresh fruit" }
  ],

  fillings: [
    { name: "White Buttercream", description: "Smooth and creamy classic buttercream" },
    { name: "Chocolate Buttercream", description: "Rich chocolate with deep cocoa flavor" },
    { name: "Almond Buttercream", description: "Delicate almond-infused sweetness" },
    { name: "Cream Cheese", description: "Tangy and creamy balance" },
    { name: "Lemon Curd", description: "Bright and zesty sweet-tart filling" },
    { name: "Strawberry", description: "Fresh strawberry with real fruit" },
    { name: "Rum/Strawberry", description: "Strawberry with a hint of rum" },
    { name: "Raspberry", description: "Tart and sweet berry filling" },
    { name: "Pecan Praline", description: "Buttery praline with toasted pecans" },
    { name: "Chocolate Mousse", description: "Light and airy chocolate mousse" },
    { name: "Lemon Mousse", description: "Tangy lemon mousse, light and fluffy" },
    { name: "Strawberry Mousse", description: "Fruity strawberry mousse filling" },
    { name: "Raspberry Mousse", description: "Tart raspberry mousse" },
    { name: "White Chocolate Mousse", description: "Creamy white chocolate mousse" },
    { name: "Mango Mousse", description: "Tropical mango mousse filling" }
  ],

  icingColors: {
    primary: [
      { hex: "#D7251C", name: "Red" },
      { hex: "#0047A8", name: "Royal Blue" },
      { hex: "#1F8F3A", name: "Green" },
      { hex: "#F6D500", name: "Yellow" },
      { hex: "#F57A00", name: "Orange" }
    ],
    pastel: [
      { hex: "#F7C6D0", name: "Baby Pink" },
      { hex: "#A7D8FF", name: "Baby Blue" },
      { hex: "#BDECC6", name: "Pastel Green" },
      { hex: "#FFF2A8", name: "Pastel Yellow" },
      { hex: "#C8B5EA", name: "Lavender" }
    ],
    neon: [
      { hex: "#FF6CA9", name: "Hot Pink" },
      { hex: "#0096FF", name: "Sky Blue" },
      { hex: "#7ED321", name: "Neon Green" },
      { hex: "#FFE600", name: "Yellow (Neon)" },
      { hex: "#FF8A00", name: "Orange (Neon)" },
      { hex: "#6A3EC7", name: "Purple" }
    ],
    fall: [
      { hex: "#8C1E14", name: "Fall Red" },
      { hex: "#3D6B0C", name: "Fall Green" },
      { hex: "#E9A200", name: "Fall Yellow" },
      { hex: "#E55C00", name: "Fall Orange" },
      { hex: "#5A2E1A", name: "Brown" }
    ],
    additional: [
      { hex: "#F6E2B5", name: "Ivory" },
      { hex: "#F9C700", name: "Golden Yellow" },
      { hex: "#D4A017", name: "Gold" },
      { hex: "#E85CA6", name: "Fuchsia" },
      { hex: "#701B22", name: "Maroon" },
      { hex: "#4A0C13", name: "Burgundy" },
      { hex: "#C4471E", name: "Burnt Orange" },
      { hex: "#32C7C7", name: "Turquoise" },
      { hex: "#0A1A57", name: "Navy Blue" },
      { hex: "#C4C4C4", name: "Gray / Silver" },
      { hex: "#000000", name: "Black" },
      { hex: "#FFFFFF", name: "White" }
    ]
  },

  icingFlavors: [
    { name: "White Buttercream", description: "Classic smooth buttercream icing" },
    { name: "Chocolate Buttercream", description: "Rich chocolate buttercream" },
    { name: "Almond Buttercream", description: "Delicate almond-flavored icing" },
    { name: "White Chocolate Buttercream", description: "Creamy white chocolate icing" },
    { name: "Cream Cheese", description: "Tangy and smooth cream cheese icing" },
    { name: "Chocolate Ganache", description: "Glossy, rich chocolate ganache" }
  ],

  decorations: {
    "Floral & Edible Art": [
      "Buttercream Flowers (hand-piped)",
      "Fondant Decorations (custom designs)",
      "Silk Flowers (Iris, Rose, Daisy, Lily)",
      "Silk Butterflies",
      "Edible Sugar-Based 'Photos' (customer provided)",
      "Fleur-de-Lis pics",
      "Rock Candy",
      "Rainbows"
    ],
    "Themed Toys & Figures": [
      "Toy Trains",
      "Plastic Dinosaurs",
      "Various Dolls",
      "Construction Toys",
      "Race Cars",
      "Plastic Deer, Squirrels, Rabbits",
      "Camping Tent & Camping Fire"
    ],
    "Celebration & Party Items": [
      "Plastic Ballet Slippers",
      "Plastic Baby Rattles",
      "Plastic Baby Bottle",
      "Plastic Graduation Cap",
      "Plastic Balloons",
      "Plastic Firework Explosions",
      "Plastic Star Explosion Insert"
    ],
    "Nature & Outdoor": [
      "Plastic Fish",
      "Plastic Pine Trees",
      "Plastic Palm Trees",
      "Paper Parasols",
      "Plastic Pics (Flamingos, Fish, Mermaids, Flip Flops, Seashells)"
    ],
    "Ribbons & Flags": [
      "Ribbons (Red, Blue, Pink, Purple, Gold, Silver, Yellow, White, Green, Black)",
      "Flags (US, Canada, Mexico)"
    ],
    "Sports": [
      "Plastic Sports Equipment (Goal Posts, Soccer Nets, Basketball Nets)"
    ]
  },

  // Mock orders for staff dashboard
  orders: [
    {
      id: 1001,
      customerName: "Sarah Johnson",
      email: "sarah@example.com",
      phone: "(713) 555-0101",
      eventDate: "2025-12-15",
      eventType: "Wedding",
      cakeType: "Lemon Doberge",
      servings: 100,
      flavorCake: "Lemon",
      flavorFilling: "Lemon Mousse",
      flavorFrosting: "White Buttercream",
      icingColor: "Ivory",
      specialRequests: "Gold leaf accents, elegant rose design",
      deposit: 150,
      totalPrice: 300,
      status: "confirmed",
      orderDate: "2025-11-15",
      notes: "Customer very happy with consultation"
    },
    {
      id: 1002,
      customerName: "Michael Chen",
      email: "michael@example.com",
      phone: "(713) 555-0102",
      eventDate: "2025-12-20",
      eventType: "Birthday",
      cakeType: "German Chocolate",
      servings: 50,
      flavorCake: "Chocolate",
      flavorFilling: "Pecan Praline",
      flavorFrosting: "Chocolate Buttercream",
      icingColor: "Brown",
      specialRequests: "Sports theme, baseball decorations",
      deposit: 100,
      totalPrice: 200,
      status: "confirmed",
      orderDate: "2025-11-10",
      notes: "Parent's surprise for son"
    },
    {
      id: 1003,
      customerName: "Lisa Martinez",
      email: "lisa@example.com",
      phone: "(713) 555-0103",
      eventDate: "2025-12-25",
      eventType: "Anniversary",
      cakeType: "Chocolate Ganache",
      servings: 40,
      flavorCake: "Devil's Food Chocolate",
      flavorFilling: "Chocolate Mousse",
      flavorFrosting: "Chocolate Ganache",
      icingColor: "Burgundy",
      specialRequests: "Heart toppers, champagne color accents",
      deposit: 125,
      totalPrice: 250,
      status: "pending_deposit",
      orderDate: "2025-11-18",
      notes: "25th anniversary - wants sophisticated design"
    },
    {
      id: 1004,
      customerName: "James Wilson",
      email: "james@example.com",
      phone: "(713) 555-0104",
      eventDate: "2026-01-10",
      eventType: "Corporate Event",
      cakeType: "Italian Cream",
      servings: 150,
      flavorCake: "Vanilla",
      flavorFilling: "Cream Cheese",
      flavorFrosting: "White Buttercream",
      icingColor: "Navy Blue",
      specialRequests: "Company logo in fondant, corporate colors",
      deposit: 200,
      totalPrice: 400,
      status: "confirmed",
      orderDate: "2025-11-05",
      notes: "Tech company, 50 people invited"
    },
    {
      id: 1005,
      customerName: "Amanda Lee",
      email: "amanda@example.com",
      phone: "(713) 555-0105",
      eventDate: "2025-12-30",
      eventType: "Baby Shower",
      cakeType: "Strawberry Delight",
      servings: 60,
      flavorCake: "Strawberry",
      flavorFilling: "Strawberry Mousse",
      flavorFrosting: "White Buttercream",
      icingColor: "Baby Pink",
      specialRequests: "Pastel flowers, baby animals, nursery theme",
      deposit: 0,
      totalPrice: 220,
      status: "inquiry",
      orderDate: "2025-11-20",
      notes: "First-time customer, awaiting consultation"
    }
  ],

  // Mock customers
  customers: [
    { id: 101, name: "Sarah Johnson", phone: "(713) 555-0101", email: "sarah@example.com", totalOrders: 2, spent: 550 },
    { id: 102, name: "Michael Chen", phone: "(713) 555-0102", email: "michael@example.com", totalOrders: 1, spent: 200 },
    { id: 103, name: "Lisa Martinez", phone: "(713) 555-0103", email: "lisa@example.com", totalOrders: 3, spent: 750 },
    { id: 104, name: "James Wilson", phone: "(713) 555-0104", email: "james@example.com", totalOrders: 1, spent: 400 },
    { id: 105, name: "Amanda Lee", phone: "(713) 555-0105", email: "amanda@example.com", totalOrders: 1, spent: 220 },
    { id: 106, name: "Robert Taylor", phone: "(713) 555-0106", email: "robert@example.com", totalOrders: 4, spent: 1200 },
    { id: 107, name: "Jennifer Garcia", phone: "(713) 555-0107", email: "jennifer@example.com", totalOrders: 2, spent: 480 },
    { id: 108, name: "David Brown", phone: "(713) 555-0108", email: "david@example.com", totalOrders: 1, spent: 180 }
  ],

  // Mock staff
  staff: [
    { id: 1, name: "Emily Boudreaux", role: "owner", email: "emily@emilybakescakes.com", startDate: "2003" },
    { id: 2, name: "Sarah Davis", role: "baker", email: "sarah@emilybakescakes.com", startDate: "2010" },
    { id: 3, name: "Maria Rodriguez", role: "decorator", email: "maria@emilybakescakes.com", startDate: "2015" },
    { id: 4, name: "John Smith", role: "sales", email: "john@emilybakescakes.com", startDate: "2018" },
    { id: 5, name: "Lisa Wong", role: "manager", email: "lisa@emilybakescakes.com", startDate: "2012" },
    { id: 6, name: "Tom Johnson", role: "accountant", email: "tom@emilybakescakes.com", startDate: "2019" }
  ],

  // Business info
  business: {
    name: "Emily Bakes Cakes",
    tagline: "Custom Cakes Crafted with Love",
    address: "2847 Westheimer Road",
    city: "Houston",
    state: "TX",
    zip: "77098",
    phone: "(713) 555-CAKE",
    email: "info@emilybakescakes.com",
    established: 2003,
    hours: {
      monday: "9am-6pm",
      tuesday: "9am-6pm",
      wednesday: "9am-6pm",
      thursday: "9am-6pm",
      friday: "9am-6pm",
      saturday: "9am-5pm",
      sunday: "Closed"
    }
  }
};

// Export for use in other files
if (typeof module !== 'undefined' && module.exports) {
  module.exports = mockData;
}
