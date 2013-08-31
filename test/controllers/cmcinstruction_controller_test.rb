require 'test_helper'

class CmcinstructionControllerTest < ActionController::TestCase
  context "a non-user should" do
  	should "not be able to see edit link" do
	    get :display_all

	    assert_no_match /Edit/, response.body
	  end
  end

  context "a logged in user should" do
  	setup do
      sign_in users(:one)
    end

    should "be able to see edit link" do
	    get :display_all

	    assert_match /Edit/, response.body
	  end
  end
end
