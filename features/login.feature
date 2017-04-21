Feature: Homepage
  Test login

  @javascript
  Scenario:
    Given I am on the homepage
    And I should see "Bienvenue sur le site du BDE de l'eXia Strasbourg"
    And I fill in "email" with "romain.muller@viacesi.fr"
    And I fill in "password" with "azeaze"
    And I wait for 5 seconds
    And I press "Se connecter"
    And I should see "Muller Romain"
    And I am on "/activity"
    And I should see "0 J'aime"
    And I should see "1 commentaires"
    And I should see "Editer"
    And I am on "/activity/1"
    And I should see "Commentaires"
    And I fill in "content" with "Ceci est un commentaire"
    And I press "Poster"
    And I wait for 5 seconds
    And I should see "Ceci est un commentaire"
    And I wait for 5 seconds
    Then I should see "Supprimer"
