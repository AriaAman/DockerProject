-- init.sql

CREATE TABLE todo (
                      id SERIAL PRIMARY KEY,
                      titre VARCHAR(255),
                      done BOOLEAN
);

INSERT INTO todo (titre, done) VALUES ('Todo 1', false);
INSERT INTO todo (titre, done) VALUES ('Todo 2', true);
INSERT INTO todo (titre, done) VALUES ('Todo 3', false);
INSERT INTO todo (titre, done) VALUES ('Todo 4', true);
INSERT INTO todo (titre, done) VALUES ('Todo 5', false);
INSERT INTO todo (titre, done) VALUES ('Todo 6', true);
INSERT INTO todo (titre, done) VALUES ('Todo 7', false);
INSERT INTO todo (titre, done) VALUES ('Todo 8', true);
INSERT INTO todo (titre, done) VALUES ('Todo 9', false);
INSERT INTO todo (titre, done) VALUES ('Todo 10', true);