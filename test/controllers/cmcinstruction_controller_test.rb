require 'test_helper'

class CmcinstructionControllerTest < ActionController::TestCase
  test "should get index" do
    get :index
    assert_response :success
  end

  test "should get display" do
    get :display
    assert_response :success
  end

end
