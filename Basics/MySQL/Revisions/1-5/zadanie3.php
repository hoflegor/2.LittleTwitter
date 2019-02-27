<?php
$queryAddImages1 = 'INSERT INTO images (offer_id, src, dimension) VALUES (250, "www.photobucket.com", "400x350")';
$queryAddImages2 = 'INSERT INTO images (offer_id, src, dimension) VALUES (175, "www.deviantart.com", "270x300")';
$queryAddImages3 = 'INSERT INTO images (offer_id, src, dimension) VALUES (200, "www.imageshack.com", "150x150")';
$queryAddImages4 = 'INSERT INTO images (offer_id, src, dimension) VALUES (160, "www.pinterest.com", "200x500")';
$queryAddImages5 = 'INSERT INTO images (offer_id, src, dimension) VALUES (169, "www.imagestock.com", "700x370")';

$queryAddCompany1 = 'INSERT INTO users_companies 
                    (user_id, name, nip, street, street_nr, phone, post_code, capital, rate,created_at)
                    VALUES (24, "Adam", 700437032, "67 Sunset Blv", 6, "384342654","02-121", 2000, 2.0, "2017-04-07")';
$queryAddCompany2 = 'INSERT INTO users_companies
                    (user_id, name, nip, street, street_nr, phone, post_code, capital, rate,created_at)
                    VALUES (169, "Weronika", 32323370, "42 Hollywood Ave", 7, "234644224", "03-255", 4000, 5.0, "2017-02-17")';
$queryAddCompany3 = 'INSERT INTO users_companies
                    (user_id, name, nip, street, street_nr, phone, post_code, capital, rate,created_at)
                    VALUES (9, "Billy", 32322323, "26/2 Broadway", 2, "230435743", "04-330", 3500, 2.5, "2017-03-10")';
$queryAddCompany4 = 'INSERT INTO users_companies
                    (user_id, name, nip, street, street_nr, phone, post_code, capital, rate,created_at)
                    VALUES (58, "Marc", 895398573, "7 42nd Street", 12, "322467854", "17-898", 5500, 2.5, "2017-03-24")';
$queryAddCompany5 = 'INSERT INTO users_companies
                    (user_id, name, nip, street, street_nr, phone, post_code, capital, rate,created_at)
                    VALUES (78, "Lucy", 249849037, "39/50 Lexington", 25, "242109321", "91-503", 2000, 5.0, "2017-04-20")';

