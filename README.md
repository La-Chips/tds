# Store Ubiquity

En raison de la crise sanitaire, beaucoup de magasins ou de commerçants ont recours de manière exceptionnelle à la vente à emporter.
Beaucoup d'entre eux n'ont pas à leur disposition une application Web leur permettant de gérer cette activité.

L'objectif de l'application décrite ci-dessous est de répondre à ce nouveau besoin :

    Pour le client : lui permettre de préparer ses commandes en ligne et de convenir d'un moment pour venir les chercher (app full-stack Ubiquity).
    Pour le commerçant : gérer la préparation des commandes et les retraits (app EmberJS).


## MCD

![20210308-012646](https://user-images.githubusercontent.com/75272120/113115167-6ebbdb00-920c-11eb-9a29-0cde04a8986d.png)

## Route

Routes | Definition
------------ | -------------
/MyAuth | Permet la connection
/ | Affiche le board
/store | Permet la navigation entre sections
/section/{idSection} | Permet de voir les produits d'une section
/product/{idSection}/{idProduct} | Permet de voir la fiche d'un produit
/newBasket | Creer un nouveau panier

## Controller

Associated views | Definition
------------ | -------------
index | affiche le board
product | affiche le produit
section | affiche la liste des produits par section
store | affiche la liste des sections


## Prerequisites

You will need the following things properly installed on your computer.

* php ^7.1
* [Git](https://git-scm.com/)
* [Composer](https://getcomposer.org)
* [Ubiquity devtools](https://ubiquity.kobject.net/)

## Installation

* `git clone <repository-url>` this repository
* `cd tds`
* `composer install`

## Running / Development

* `Ubiquity serve`
* Visit your app at [http://127.0.0.1:8090](http://127.0.0.1:8090).

### devtools

Make use of the many generators for code, try `Ubiquity help` for more details

### Optimization for production

Run:
`composer install --optimize --no-dev --classmap-authoritative`

### Deploying

Specify what it takes to deploy your app.

## Further Reading / Useful Links

* [Ubiquity website](https://ubiquity.kobject.net/)
* [Guide](http://micro-framework.readthedocs.io/en/latest/?badge=latest)
* [Doc API](https://api.kobject.net/ubiquity/)
* [Twig documentation](https://twig.symfony.com)
* [Semantic-UI](https://semantic-ui.com)
