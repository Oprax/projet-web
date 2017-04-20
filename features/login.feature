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
    Then I should see "Muller Romain"