// Test suite for MK-Times Portfolio web app
// This file contains Cypress end-to-end tests for authentication, navigation, cart, and order features

describe('template spec', () => {
  /*
  // Runs before each test (if uncommented): logs in as a user
  beforeEach(() => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
    cy.get('input[name="email"]').type('test@email.com')
    cy.get('input[name="pass"]').type('123')
    cy.get('input[type="submit"]').click()
    cy.url().should('include', 'home.php')
    cy.get('h1').should('contain', 'Welcome to MK-Times!')
  })
  */

  // Test: Can visit login page
  it('Can visit login page', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
    cy.url().should('include', 'login.php')
    cy.get('h1').should('contain', 'Login')
  })

  // Test: Can login with valid credentials
  it('Can login with valid credentials', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
    cy.get('input[name="email"]').type('jd@jd.com')
    cy.get('input[name="pass"]').type('123')
    cy.get('input[type="submit"]').click()
    cy.url().should('include', 'home.php')
    cy.get('h1').should('contain', 'Welcome to MK-Times!')
  })

  // Test: Can login with invalid credentials
  it('Can login with invalid credentials', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
    cy.get('input[name="email"]').type('sdf')
    cy.get('input[name="pass"]').type('123')
    cy.get('input[type="submit"]').click()
    cy.url().should('include', 'login_action.php')
    cy.get('.alert').should('contain', 'Oops! There was a problem')
  })

  // Test: Can visit the register page
  it('Can visit the register page', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/register.php')
    cy.url().should('include', 'register.php')
    cy.get('h1').should('contain', 'Register')
  })

  /*
  // Test: Can register with valid credentials (commented out to avoid creating test accounts)
  it('Can register with valid credentials', () => {
    //Create a random email to avoid conflicts
    const randomEmail = `test${Math.floor(Math.random() * 10000)}@email.com`
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/register.php')
    cy.get('input[name="first_name"]').type('John')
    cy.get('input[name="last_name"]').type('Doe')
    cy.get('input[name="email"]').type(randomEmail)
    cy.get('input[name="pass1"]').type('123')
    cy.get('input[name="pass2"]').type('123')
    cy.get('input[type="submit"]').click()
    cy.get('.alert').should('contain', 'Thank you for registering!')
    })
  */

  // Test: Can register with invalid credentials
  it('Can register with invalid credentials', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/register.php')
    cy.get('input[name="first_name"]').type('John')
    cy.get('input[name="last_name"]').type('Doe')
    cy.get('input[name="email"]').type('test@email.com')
    cy.get('input[name="pass1"]').type('tererstsdf')
    cy.get('input[name="pass2"]').type('123')
    cy.get('input[type="submit"]').click()
    cy.get('.alert').should('contain', 'Oops! There was a problem')
  })

  // Test: Redirects to login if not logged in and visiting home
  it('Can visit the home page without logging in first', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/home.php')
    cy.url().should('include', 'login.php')
    cy.get('h1').should('contain', 'Login')
  })

  // Test: Can visit the home page after logging in
  it('Can visit the home page after logging in', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/home.php')
    cy.url().should('include', 'home.php')
    cy.get('h1').should('contain', 'Welcome to MK-Times!')
  })

  // Test: Footer is present on the home page
  it('Footer is present on the home page', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/home.php')
    cy.get('footer').should('exist')
  })

  // Test: Navigation links and dropdowns
  it('Navigation Links take you to the correct pages', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/home.php')
    cy.get('nav a').contains('Products').click()
    cy.url().should('include', 'products.php')
    cy.get('h1').should('contain', 'Our Collection')
    // Open the dropdown
    cy.get('#navbarDropdownMenuLink').click(); // Clicks the dropdown toggle
    // Click the Cart link in the dropdown
    cy.get('.dropdown-menu').contains('Cart').click(); // Navigates to the Cart page
    // If you want to test Order History, use the following instead:
    // cy.get('.dropdown-menu').contains('Order History').click(); // Navigates to the Order History page
    cy.url().should('include', 'cart.php')
    cy.get('.alert').should('contain', 'Your cart is currently empty.')
    // Open the dropdown
    cy.get('#navbarDropdownMenuLink').click();
    // Then click Order History
    cy.get('.dropdown-menu').contains('Order History').click()
    cy.url().should('include', 'orders.php')
    cy.get('h1').should('contain', 'Your Orders')
    cy.get('nav a').contains('Home').click()
    cy.url().should('include', 'home.php')
    cy.get('h1').should('contain', 'Welcome to MK-Times!')
  })

  // Test: Can visit the products page
  it('Can visit the products page', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/products.php')
    cy.url().should('include', 'products.php')
    cy.get('h1').should('contain', 'Our Collection')
  })

  // Test: Can add a product to the cart
  it('Can add a product to the cart', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/products.php')
    cy.get('.btn').first().find('a').click()
    cy.url().should('include', 'added.php')
    cy.get('.alert').should('contain', 'added to your cart')
  })

  // Test: Can view the cart when no item is in cart
  it('Can view the cart when no item is in cart', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.url().should('include', 'cart.php')
    cy.get('.alert').should('contain', 'Your cart is currently empty.')
  })

  // Test: Can view the cart with items
  it('Can view the cart', () => {
    userLogin()
    addProductToCart()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.url().should('include', 'cart.php')
    cy.get('h1').should('contain', 'Your Cart')
  })

  // Test: Can remove a product from the cart
  it('Can remove a product from the cart', () => {
    userLogin()
    addProductToCart()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.get('button[type="submit"]').click()
    cy.get('.alert').should('contain', 'Your cart is currently empty.')
  })

  // Test: Can update quantity of a product in the cart
  it('Can update quantity of a product in the cart', () => {
    userLogin()
    addProductToCart()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.get('input[type="text"]').clear().type('2')
    cy.get('input[type="submit"]').click()
    cy.get('[data-cy="totalPrice"]').should('contain', '£ 287.98')
  })

  /*
  // Test: Can checkout with a product in the cart (commented out to avoid creating orders)
  it('Can checkout with a product in the cart', () => {
    userLogin()
    addProductToCart()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.get('[data-cy="checkOutButton"]').click()
    cy.url().should('include', 'checkout.php')
    cy.get('.alert').should('contain', 'Thanks for your order.')
  })
  */

  // Test: Can logout
  it('Can logout', () => {
    userLogin()
    cy.get('a[href="logout.php"]').click()
    cy.url().should('include', 'login.php')
    cy.get('h1').should('contain', 'Login')
  })

  // Test: Can view order history
  it('Can view order history', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/orders.php')
    cy.url().should('include', 'orders.php')
    cy.get('h1').should('contain', 'Your Orders')
  })

  // Test: Can view order details
  it('Can view order details', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/orders.php')
    cy.url().should('include', 'orders.php')
    cy.get('h1').should('contain', 'Your Orders')
    cy.get('[data-cy="itemName"]').first().should('contain', 'MKTimes Ocean Sovereign')
  })
})

// Helper function: logs in as a test user
function userLogin() {
  cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
  cy.get('input[name="email"]').type('test@email.com')
  cy.get('input[name="pass"]').type('123')
  cy.get('input[type="submit"]').click()
  cy.url().should('include', 'home.php')
  cy.get('h1').should('contain', 'Welcome to MK-Times!')
}
// Helper function: logs in and adds a product to the cart
function addProductToCart() {
  userLogin()
  cy.visit('http://localhost/codespace/MK-Times-Portfolio/products.php')
  cy.get('.btn').first().find('a').click()
  cy.url().should('include', 'added.php')
  cy.get('.alert').should('contain', 'added to your cart')
}