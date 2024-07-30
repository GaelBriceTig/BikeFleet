
INSERT INTO categories (name)
VALUES  
    ('Electric bike'),
    ('Road bike'),
    ('Mountain bike'),
    ('Folding bike');

INSERT INTO status (name)
VALUES
    ('ready'),
    ('need maintenance'),
    ('broken for good');

CREATE TABLE IF NOT EXISTS bikes (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    manufactureDate DATE,
    materials VARCHAR(150),
    status_id INTEGER,
    category_id INTEGER,
    FOREIGN KEY (status_id) REFERENCES status (id),
    FOREIGN KEY (category_id) REFERENCES categories (id)
);


INSERT INTO bikes (manufactureDate, materials, status_id, category_id)
VALUES
    ('2020-12-05', 'aluminium', '1', '3'),
    ('2019-09-10', 'carbone fibre', '2', '1'),
    ('2018-11-24', 'carbone fibre', '1', '4');


SELECT b.id, b.manufactureDate, b.materials, c.name, s.name
FROM bikes b
JOIN categories c on b.category_id = c.id
JOIN status s on b.status_id = s.id;

