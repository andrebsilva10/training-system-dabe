INSERT INTO users (name, email, password) VALUES ('André', 'andre@email.com', '$2y$10$NeMHijq2XZpS9Q1oMZ26beL8Sx27jN8yIBskFgcZPajXaKNr.Jb5q');
INSERT INTO users (name, email, password) VALUES ('Diego', 'marczal@utfpr.edu.br', '$2y$10$NeMHijq2XZpS9Q1oMZ26beL8Sx27jN8yIBskFgcZPajXaKNr.Jb5q');

INSERT INTO trainings (name, user_id) VALUES ('Treinamento 1', LAST_INSERT_ID());
INSERT INTO trainings (name, user_id) VALUES ('Treinamento 2', LAST_INSERT_ID());
INSERT INTO trainings (name, user_id) VALUES ('Treinamento 3', LAST_INSERT_ID());
INSERT INTO trainings (name, user_id) VALUES ('Treinamento 4', LAST_INSERT_ID());
INSERT INTO trainings (name, user_id) VALUES ('Treinamento 5', LAST_INSERT_ID());
INSERT INTO trainings (name, user_id) VALUES ('Treinamento 6', LAST_INSERT_ID());
INSERT INTO trainings (name, user_id) VALUES ('Treinamento 7', LAST_INSERT_ID());
INSERT INTO trainings (name, user_id) VALUES ('Treinamento 8', LAST_INSERT_ID());
INSERT INTO trainings (name, user_id) VALUES ('Treinamento 9', LAST_INSERT_ID());
INSERT INTO trainings (name, user_id) VALUES ('Treinamento 10', LAST_INSERT_ID());
