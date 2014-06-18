CREATE TABLE albums (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(30),
	year INT NOT NULL,
	artist VARCHAR(30),
	PRIMARY KEY (id)
);

INSERT INTO albums (name, year, artist)
VALUES ('Thriller', 1982, 'Michael JAckson'),
    ('The Dark Side of the Mon', 1973, 'Pink FLoyd'),
    ('The Greatest Hits', 1976, 'Eagles'),
    ('Back in BLack', 1980, 'AC/DC'),
    ('Bee Gees', 1977, 'Saturday Night Fever' ),
    ('The Bodyguard', 1992, 'Whitney Houston'),
    ('Come On Over', 1997, 'Shania Twain'),
    ('Led Zeppelin', 1971, 'Led Zeppelin'),
    ('Bat Out of Hell', 1977, 'Meat Loaf'),
    ('Jagged Little Pill', 1995, 'Alanis Morissette');