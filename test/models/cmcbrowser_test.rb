require 'test_helper'

class CmcbrowserTest < ActiveSupport::TestCase
  # test "the truth" do
  #   assert true
  # end

  test "Can only add browser which has unique name, slug, version and platform" do
  	browser = cmcbrowsers(:one).clone

  	assert !browser.save, "Can't save identical browser"

  	browser.version = (browser.version + 1)
  	assert browser.save, "can save unique browser"
  end
end
