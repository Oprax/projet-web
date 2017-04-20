Feature: Homepage
  Test login

  Scenario: Content
    Given I am on the homepage
    Then I should see "Bienvenue sur le site du BDE de l'eXia Strasbourg"

  Scenario:
    Given I am on the homepage
    And I fill in "email" with "romain.muller@viacesi.fr"
    And I fill in "password" with "azeaze"
    And I wait for 1 seconds
    And I press "Se connecter"
    And I should see "Muller Romain"
    And I press "Activités"
    And I should see "0 J'aime"
    And I should see "1 commentaires"
    And I should see "Editer"
    And I should see "Supprimer"
    And I press "0 J'aime"
    And I wait for 1 seconds
    And I should see "1 J'aime"
    And I press "1 J'aime"
    And I wait for 1 seconds
    Then I should see "0 J'aime"
