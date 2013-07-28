require 'test_helper'

class CmcbrowsersControllerTest < ActionController::TestCase
  setup do
    @cmcbrowser = cmcbrowsers(:one)
  end

  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:cmcbrowsers)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  test "should create cmcbrowser" do
    assert_difference('Cmcbrowser.count') do
      post :create, cmcbrowser: { cmcplatform_id: @cmcbrowser.cmcplatform_id, howto: @cmcbrowser.howto, name: @cmcbrowser.name, slug: @cmcbrowser.slug, version: @cmcbrowser.version }
    end

    assert_redirected_to cmcbrowser_path(assigns(:cmcbrowser))
  end

  test "should show cmcbrowser" do
    get :show, id: @cmcbrowser
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @cmcbrowser
    assert_response :success
  end

  test "should update cmcbrowser" do
    patch :update, id: @cmcbrowser, cmcbrowser: { cmcplatform_id: @cmcbrowser.cmcplatform_id, howto: @cmcbrowser.howto, name: @cmcbrowser.name, slug: @cmcbrowser.slug, version: @cmcbrowser.version }
    assert_redirected_to cmcbrowser_path(assigns(:cmcbrowser))
  end

  test "should destroy cmcbrowser" do
    assert_difference('Cmcbrowser.count', -1) do
      delete :destroy, id: @cmcbrowser
    end

    assert_redirected_to cmcbrowsers_path
  end
end
