CREATE VIEW viewItems1 AS
SELECT items.* , categories.* FROM items
INNER JOIN categories ON items.item_categories = categories.categories_id 

CREATE OR REPLACE VIEW myfavorite AS
SELECT favorite.* ,items.* ,users.user_id FROM favorite 
INNER JOIN users ON users.user_id  = favorite.favorite_userId 
INNER JOIN items ON items.item_id = favorite.favorite_itemsId

CREATE OR REPLACE VIEW cartview AS
SELECT SUM(items.item_price) as itemPrice ,COUNT(cart_itemId) AS countItems , cart.*  , items.* FROM cart 
INNER JOIN items ON items.item_id  = cart.cart_itemId 
GROUP BY cart.cart_itemId , cart.cart_userId