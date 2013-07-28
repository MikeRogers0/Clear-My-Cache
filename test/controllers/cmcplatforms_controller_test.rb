require 'test_helper'

class CmcplatformsControllerTest < ActionController::TestCase
  setup do
    @cmcplatform = cmcplatforms(:one)
  end

  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:cmcplatforms)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  test "should create cmcplatform" do
    assert_difference('Cmcplatform.count') do
      post :create, cmcplatform: { howto: @cmcplatform.howto, name: @cmcplatform.name, slug: @cmcplatform.slug, version: @cmcplatform.version }
    end

    assert_redirected_to cmcplatform_path(assigns(:cmcplatform))
  end

  test "should show cmcplatform" do
    get :show, id: @cmcplatform
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @cmcplatform
    assert_response :success
  end

  test "should update cmcplatform" do
    patch :update, id: @cmcplatform, cmcplatform: { howto: @cmcplatform.howto, name: @cmcplatform.name, slug: @cmcplatform.slug, version: @cmcplatform.version }
    assert_redirected_to cmcplatform_path(assigns(:cmcplatform))
  end

  test "should destroy cmcplatform" do
    assert_difference('Cmcplatform.count', -1) do
      delete :destroy, id: @cmcplatform
    end

    assert_redirected_to cmcplatforms_path
  end
end
