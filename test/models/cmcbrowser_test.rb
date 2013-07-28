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

  test "Only allow slug to be lowercase letters and hyphens" do
  	browser = cmcbrowsers(:one).clone
  	browser.slug = "this will Fai!"

  	assert !browser.save
  	assert browser.errors[:slug].include?('Must only be lowercase letters, hyphens and underscores'), 'Slug was formatted incorrectly'

  	browser.slug = "this_this-fine"
  	assert browser.save
  end

  test "Only allow name to be letters, spaces and hyphens" do
  	browser = cmcbrowsers(:one).clone
  	browser.name = "Chrome! "

  	assert !browser.save
  	assert browser.errors[:name].include?('Must only be letters, spaces and hyphens'), 'Name was formatted incorrectly'

  	browser.name = "Google Chrome"
  	assert browser.save
  end
end
