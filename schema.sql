CREATE TABLE IF NOT EXISTS task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);

INSERT INTO task (title) VALUES ("Task 1");
INSERT INTO task (title) VALUES ("Task 2");
INSERT INTO task (title) VALUES ("Task 3");
