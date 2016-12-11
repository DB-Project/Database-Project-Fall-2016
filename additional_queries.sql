-- Additional querires that are inputted directly into the Database
-- --------------------------------------------------------
-- Insert interests
INSERT INTO interest (category, keyword)
VALUES 	("Sports", "Basketball"),
		("Music", "Hip Hop"),
		("Books", "Sci-Fi"),
		("Sports", "Soccer"),
		("Sports", "Football"),
		("Sports", "Hockey"),
		("Sports", "Tennis"),
		("Music", "Classical"),
		("Music", "R&B"),
		("Books", "Fiction"),
		("Books", "Nonfiction"),
		("Game", "RPG"),
		("Game", "FPS"),
		("Game", "Puzzle"),
		("Cars", "SUV"),
		("Cars", "Racing cars"),
		("Cars", "Luxury"),
		("Computer", "PC"),
		("Computer", "Mac");

-- --------------------------------------------------------
-- About insert due to FK Constraint (Interest)
INSERT INTO about (category, keyword, group_id)
VALUES	("Sports", "Basketball", 1),
		("Music", "Hip Hop", 2),
		("Books", "Sci-Fi", 3),
		("Sports", "Hockey", 4),
		("Music", "Classical", 4),
		("Music", "R&B", 2),
		("Books", "Fiction", 3),
		("Books", "Nonfiction", 2),
		("Game", "RPG", 1),
		("Game", "Puzzle", 3),
		("Cars", "SUV", 2),
		("Cars", "Racing cars", 1),
		("Computer", "Mac", 4);

-- --------------------------------------------------------
-- Interested_in insert due to FK Constraint (Interest)
INSERT INTO interested_in (username, category, keyword)
VALUES	("admin", "Music", "Hip Hop"),
		("admin", "Books", "Sci-Fi"),
		("hskim105", "Sports", "Football"),
		("admin", "Sports", "Hockey"),
		("admin", "Sports", "Tennis"),
		("hskim105", "Music", "Classical"),
		("hskim105", "Books", "Fiction"),
		("hskim105", "Game", "FPS"),
		("admin", "Game", "Puzzle"),
		("admin", "Cars", "Racing cars"),
		("hskim105", "Cars", "Luxury"),
		("admin", "Computer", "PC");
		
-- --------------------------------------------------------
-- Insert Locations
INSERT INTO location (location_name, zipcode, address, description, latitude, longitude)
VALUES 	("NYU", 11201, "234 Main St", "New York University", 42.2351667, -75.9586296),
		("NEU", 02115, "52 Beacon St", "Northeaster University", 42.301441, -75.9631163),
		("Joe Pizza", 11201, "42 Mountain Ave.", "Original Pizza from Siciliy", 42.0026658, -75.4717757),
		("Lobster Back", 45218, "1776 Tea House Rd.", "Tea company from London", 42.000061, -75.3930555),
		("Founding Fathers", 02210, "123 Freedom Ave. Boston, MA", 'For the people, By the people', -71.05888, 42.360083),
		("White House", 20500, "1600 Pennsylvania Ave NW, Washington, DC", "My house", -77.0365298, 38.8976763),
		("Joe Pizza", 07675, "53 DeWolf St.", "Pizza love", 42.2351667, -75.9586296);