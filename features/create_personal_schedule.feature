Feature: Create personal schedule
  In order to spend more time socialising at the conference instead of looking at the schedule
  As a conference attendee
  I want to create my personal schedule beforehand

  Scenario: Successfully selecting 1 talk from the 1 track conference for a single slot
    Given a conference named "Agile Conference" with 1 track was planned
    And the "Specification" talk is scheduled for "10:30-11:30" slot on the conference track 1
    When I choose the "Specification" talk for my personal schedule of this conference
    Then the chosen talk for "10:30-11:30" slot of my schedule should be the "Specification"
