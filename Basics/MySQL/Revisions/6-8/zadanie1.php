<?php

$queryRelationImages = 'ALTER TABLE images ADD FOREIGN KEY (offer_id) REFERENCES offers(id)';

$queryRelationUsersCompanies = 'ALTER TABLE users_companies ADD FOREIGN KEY (id) REFERENCES users (id)';