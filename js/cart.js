
    // Array to store selected products
    const cartItems = [];

    // Add event listeners to "Add to cart" buttons
    document.querySelectorAll('.newProducts button').forEach(button => {
        button.addEventListener('click', function () {
            const product = this.closest('.newProducts');
            const productName = product.querySelector('h4').innerText;
            const productPrice = product.querySelector('.price p').innerText;
            const productImage = product.querySelector('img').src;

            // Add product to cart array
            cartItems.push({ name: productName, price: productPrice, image: productImage });

            // Optional: Provide feedback to the user
            alert(`${productName} has been added to your cart.`);
        });
    });

    // Populate the cart modal when it's shown
    document.querySelector('#cart').addEventListener('show.bs.modal', function () {
        const cartContainer = document.getElementById('cart-items');
        cartContainer.innerHTML = ''; // Clear previous content

        // If no items in cart
        if (cartItems.length === 0) {
            cartContainer.innerHTML = '<p>Your cart is empty.</p>';
            return;
        }

        // Generate cart item elements
        cartItems.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item', 'd-flex', 'align-items-center', 'mb-3');
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="me-3" style="width: 50px; height: 50px;">
                <div class="flex-grow-1">
                    <h6>${item.name}</h6>
                    <p>${item.price}</p>
                </div>
                <button class="btn btn-danger btn-sm remove-btn" data-index="${index}">Remove</button>
            `;
            cartContainer.appendChild(cartItem);
        });

        // Add event listeners to "Remove" buttons
        cartContainer.querySelectorAll('.remove-btn').forEach(button => {
            button.addEventListener('click', function () {
                const index = parseInt(this.getAttribute('data-index'));
                cartItems.splice(index, 1); // Remove item from array
                updateCart(); // Update cart display
            });
        });
    });

    // Function to update the cart display
    function updateCart() {
        const cartContainer = document.getElementById('cart-items');
        cartContainer.innerHTML = ''; // Clear previous content

        // If no items in cart
        if (cartItems.length === 0) {
            cartContainer.innerHTML = '<p>Your cart is empty.</p>';
            return;
        }

        // Generate updated cart item elements
        cartItems.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item', 'd-flex', 'align-items-center', 'mb-3');
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="me-3" style="width: 50px; height: 50px;">
                <div class="flex-grow-1">
                    <h6>${item.name}</h6>
                    <p>${item.price}</p>
                </div>
                <button class="btn btn-danger btn-sm remove-btn" data-index="${index}">Remove</button>
            `;
            cartContainer.appendChild(cartItem);
        });

        // Re-add event listeners to "Remove" buttons
        cartContainer.querySelectorAll('.remove-btn').forEach(button => {
            button.addEventListener('click', function () {
                const index = parseInt(this.getAttribute('data-index'));
                cartItems.splice(index, 1); // Remove item from array
                updateCart(); // Update cart display
            });
        });
    }

