DROP DATABASE cookbook;
CREATE DATABASE cookbook;
USE cookbook;

CREATE TABLE recipes(
    id int PRIMARY KEY NOT NULL auto_increment,
    recipe_name varchar(25) NOT NULL,
    photo longblob NOT NULL,
    ingredients text NOT NULL,
    method text NOT NULL
);


INSERT INTO recipes (recipe_name,photo,ingredients,method) VALUES(
'Torta al matcha',
'torta_matcha.jpeg',
'200 g di Farina 00,4 Uova,200 g di Burro ammorbidito,
200 g di Zucchero Semolato,
12 g di Lievito per Dolci,
1/2 di Baccello di Vaniglia,
4 cucchiaini di Tè matcha in polvere,
2 cucchiai di Latte',
'Prendere una ciotola di grandi dimensioni e sbattete il burro con lo zucchero fino ad ottenere un composto spumoso.
Aggiungere le uova, una alla volta, e la vaniglia.
Continuare a montare.
Aggiungere il lievito e la farina precedentemente setacciati e mescolare con una spatola
dall alto verso il basso per non far smontare. Sciogliere il tè matcha nel latte tiepido
e mescolare bene.
Aggiungere il tutto al composto precedente e mescolare.
Mettere la carta forno in uno stampo per dolci e versare il composto,
livellandone la superficie con una spatola. Cuocere in forno preriscaldato a 170°C per 60 minuti,
sfornare la torta al tè Matcha e farla raffreddare prima di servire.
');
    