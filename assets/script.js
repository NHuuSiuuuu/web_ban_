
let cart = [];

function addToCart(product) {
    cart.push(product);
    console.log('Đã thêm sản phẩm vào giỏ hàng:', product);

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    const cartCountElement = document.getElementById('cart-count');
    cartCountElement.innerText = cart.length;
}
document.addEventListener('DOMContentLoaded', function () {
    // Lặp qua tất cả các nút "Thêm vào Giỏ Hàng"
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Lấy thông tin sản phẩm từ phần tử cha của nút được nhấn
            const productElement = this.parentElement;
            const product = {
                name: productElement.querySelector('h3').innerText,
                price: productElement.querySelector('h3:last-of-type').innerText
            };
            addToCart(product);
        });
    }
    );
});


function filterProducts(category) {
    const products = document.querySelectorAll('.product');
    products.forEach(product => {
        const categoryElement = product.querySelector('p');
        if (categoryElement.textContent === category || category === 'All') {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
    // Kiểm tra xem có checkbox nào được chọn không
    const checkboxes = document.querySelectorAll('.filter-menu input[type="checkbox"]');
    let anyChecked = false;
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            anyChecked = true;
        }
    });
    // Nếu không có checkbox nào được chọn, hiển thị lại tất cả sản phẩm
    if (!anyChecked) {
        products.forEach(product => {
            product.style.display = 'block';
        });
    }
}