INSERT INTO users (name, email, password, is_admin) VALUES ('André', 'andre@email.com', '$2y$10$NeMHijq2XZpS9Q1oMZ26beL8Sx27jN8yIBskFgcZPajXaKNr.Jb5q', 1);
INSERT INTO users (name, email, password, is_admin) VALUES ('Diego', 'marczal@utfpr.edu.br', '$2y$10$NeMHijq2XZpS9Q1oMZ26beL8Sx27jN8yIBskFgcZPajXaKNr.Jb5q', 0);
INSERT INTO users (name, email, password, is_admin) VALUES ('Evillyn', 'evillynnaiana@utfpr.edu.br', '$2y$10$NeMHijq2XZpS9Q1oMZ26beL8Sx27jN8yIBskFgcZPajXaKNr.Jb5q', 1);

INSERT INTO trainings_category (name) VALUES ('Desenvolvimento Pessoal');
INSERT INTO trainings_category (name) VALUES ('Programação');
INSERT INTO trainings_category (name) VALUES ('Gestão de Projetos');
INSERT INTO trainings_category (name) VALUES ('Idiomas');
INSERT INTO trainings_category (name) VALUES ('Saúde e Bem-estar');
INSERT INTO trainings_category (name) VALUES ('Marketing Digital');
INSERT INTO trainings_category (name) VALUES ('Design Gráfico');
INSERT INTO trainings_category (name) VALUES ('Finanças Pessoais');
INSERT INTO trainings_category (name) VALUES ('Liderança');
INSERT INTO trainings_category (name) VALUES ('Tecnologia da Informação');

INSERT INTO trainings (name, training_category_id) VALUES ('Comunicação Eficaz no Trabalho', 1);
INSERT INTO trainings (name, training_category_id) VALUES ('Desenvolvimento Web com JavaScript', 2);
INSERT INTO trainings (name, training_category_id) VALUES ('Gerenciamento Ágil de Projetos', 3);
INSERT INTO trainings (name, training_category_id) VALUES ('Inglês Intermediário', 4);
INSERT INTO trainings (name, training_category_id) VALUES ('Yoga e Meditação para o Trabalhador', 5);
INSERT INTO trainings (name, training_category_id) VALUES ('Estratégias de Marketing Digital', 6);
INSERT INTO trainings (name, training_category_id) VALUES ('Introdução ao Design Gráfico', 7);
INSERT INTO trainings (name, training_category_id) VALUES ('Finanças Pessoais: Planejamento e Controle', 8);
INSERT INTO trainings (name, training_category_id) VALUES ('Liderança Transformacional', 9);
INSERT INTO trainings (name, training_category_id) VALUES ('Introdução à Inteligência Artificial', 10);

INSERT INTO trainings_users (user_id, training_id) VALUES (1, 1);
INSERT INTO trainings_users (user_id, training_id) VALUES (2, 2);
INSERT INTO trainings_users (user_id, training_id) VALUES (3, 3);
INSERT INTO trainings_users (user_id, training_id) VALUES (1, 4);
INSERT INTO trainings_users (user_id, training_id) VALUES (2, 5);
INSERT INTO trainings_users (user_id, training_id) VALUES (3, 6);
INSERT INTO trainings_users (user_id, training_id) VALUES (1, 7);
INSERT INTO trainings_users (user_id, training_id) VALUES (2, 8);
INSERT INTO trainings_users (user_id, training_id) VALUES (3, 9);
INSERT INTO trainings_users (user_id, training_id) VALUES (1, 10);
