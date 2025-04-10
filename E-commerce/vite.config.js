import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/admin/books/book.js',
                'resources/js/admin/books/books.js',
                'resources/js/admin/categories/categories.js',
                'resources/js/admin/categories/category.js',
                'resources/js/admin/categories/createInputValidation.js',
                'resources/js/admin/categories/updateInputValidation.js',
                'resources/js/admin/orders/changeStatusInputValidation.js',
                'resources/js/admin/orders/order.js',
                'resources/js/admin/orders/orders.js',
                'resources/js/admin/payments/changeStatusInputValidation.js',
                'resources/js/admin/payments/payment.js',
                'resources/js/admin/payments/payments.js',
                'resources/js/admin/reviews/review.js',
                'resources/js/admin/reviews/reviews.js',
                'resources/js/admin/users/user.js',
                'resources/js/admin/users/users.js',
                'resources/js/admin/users/createInputValidation.js',
                'resources/js/admin/users/updateInputValidation.js',
                'resources/js/admin/visits/visits.js',
                'resources/js/auth/forgetPasswordInputValidation.js',
                'resources/js/auth/loginInputValidation.js',
                'resources/js/auth/registerInputValidation.js',
                'resources/js/auth/resetPasswordInputValidation.js',
                'resources/js/client/book/bookFilter.js',
                'resources/js/client/book/searchTerms.js',
                'resources/js/client/cart/addOneToCart.js',
                'resources/js/client/cart/addToCart.js',
                'resources/js/client/cart/cartScript.js',
                'resources/js/client/cart/removeFromCart.js',
                'resources/js/client/order/trackOrderScript.js',
                'resources/js/client/payment/checkoutInputValidation.js',
                'resources/js/client/reviews/bookReviewScript.js',
                'resources/js/client/wishlist/addToWishlist.js',
                'resources/js/client/wishlist/deleteFromWishlist.js',
                'resources/js/client/wishlist/removeFromWishlist.js',
                'resources/js/notifications/notifications.js',
                'resources/js/publisher/books/book.js',
                'resources/js/publisher/books/books.js',
                'resources/js/publisher/books/createInputValidation.js',
                'resources/js/publisher/books/updateInputValidation.js',
                'resources/js/publisher/orders/orders.js',
                'resources/js/publisher/orders/cancelOrder.js',
                'resources/js/publisher/reviews/reviews.js',
                'resources/js/users/changePasswordInputValidation.js',
                'resources/js/users/updateProfileInputValidation.js',
            ],
            refresh: true,
        }),
    ],
});
