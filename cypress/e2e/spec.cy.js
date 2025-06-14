describe('template spec', () => {
  /*
  beforeEach(() => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
    cy.get('input[name="email"]').type('test@email.com')
    cy.get('input[name="pass"]').type('123')
    cy.get('input[type="submit"]').click()
    cy.url().should('include', 'home.php')
    cy.get('h1').should('contain', 'Welcome to MK-Times!')
  })
  */
  it('Can visit login page', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
    cy.url().should('include', 'login.php')
    cy.get('h1').should('contain', 'Login')
  })
  it('Can login with valid credentials', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
    cy.get('input[name="email"]').type('jd@jd.com')
    cy.get('input[name="pass"]').type('123')
    cy.get('input[type="submit"]').click()
    cy.url().should('include', 'home.php')
    cy.get('h1').should('contain', 'Welcome to MK-Times!')
  })
  it('Can login with invalid credentials', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
    cy.get('input[name="email"]').type('sdf')
    cy.get('input[name="pass"]').type('123')
    cy.get('input[type="submit"]').click()
    cy.url().should('include', 'login_action.php')
    cy.get('.alert').should('contain', 'Oops! There was a problem')
  })
  it('Can visit the register page', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/register.php')
    cy.url().should('include', 'register.php')
    cy.get('h1').should('contain', 'Register')
  })
  /* So it doesn't create countless test accounts, this is commented out.

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
  it('Can visit the home page without logging in first', () => {
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/home.php')
    cy.url().should('include', 'login.php')
    cy.get('h1').should('contain', 'Login')
  })
  it('Can visit the home page after logging in', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/home.php')
    cy.url().should('include', 'home.php')
    cy.get('h1').should('contain', 'Welcome to MK-Times!')
  })
 it('Can visit the products page', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/products.php')
    cy.url().should('include', 'products.php')
    cy.get('h1').should('contain', 'Our Collection')
  })
  it('Can add a product to the cart', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/products.php')
    cy.get('.btn').first().find('a').click()
    cy.url().should('include', 'added.php')
    cy.get('.alert').should('contain', 'added to your cart')
  })
  it('Can view the cart when no item is in cart', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.url().should('include', 'cart.php')
    cy.get('.alert').should('contain', 'Your cart is currently empty.')
  })
  it('Can view the cart', () => {
    userLogin()
    addProductToCart()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.url().should('include', 'cart.php')
    cy.get('h1').should('contain', 'Your Cart')
  })
  it('Can remove a product from the cart', () => {
    userLogin()
    addProductToCart()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.get('button[type="submit"]').click()
    cy.get('.alert').should('contain', 'Your cart is currently empty.')
  })
  it('Can update quantity of a product in the cart', () => {
    userLogin()
    addProductToCart()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.get('input[type="text"]').clear().type('2')
    cy.get('input[type="submit"]').click()
    cy.get('[data-cy="totalPrice"]').should('contain', '£ 287.98')
  })
  /* Commented out to avoid creating orders in the database during tests. does work.
  it('Can checkout with a product in the cart', () => {
    userLogin()
    addProductToCart()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/cart.php')
    cy.get('[data-cy="checkOutButton"]').click()
    cy.url().should('include', 'checkout.php')
    cy.get('.alert').should('contain', 'Thanks for your order.')
  })
  */
  it('Can logout', () => {
    userLogin()
    cy.get('a[href="logout.php"]').click()
    cy.url().should('include', 'login.php')
    cy.get('h1').should('contain', 'Login')
  })
  it('Can view order history', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/orders.php')
    cy.url().should('include', 'orders.php')
    cy.get('h1').should('contain', 'Your Orders')
  })
  it('Can view order details', () => {
    userLogin()
    cy.visit('http://localhost/codespace/MK-Times-Portfolio/orders.php')
    cy.url().should('include', 'orders.php')
    cy.get('h1').should('contain', 'Your Orders')
    cy.get('table tbody tr').first().find('a').click()
  })
})


// Helper functions
function userLogin() {
  cy.visit('http://localhost/codespace/MK-Times-Portfolio/login.php')
  cy.get('input[name="email"]').type('test@email.com')
  cy.get('input[name="pass"]').type('123')
  cy.get('input[type="submit"]').click()
  cy.url().should('include', 'home.php')
  cy.get('h1').should('contain', 'Welcome to MK-Times!')
}
function addProductToCart() {
  userLogin()
  cy.visit('http://localhost/codespace/MK-Times-Portfolio/products.php')
  cy.get('.btn').first().find('a').click()
  cy.url().should('include', 'added.php')
  cy.get('.alert').should('contain', 'added to your cart')
}