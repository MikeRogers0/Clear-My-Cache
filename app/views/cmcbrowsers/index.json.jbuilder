json.array!(@cmcbrowsers) do |cmcbrowser|
  json.extract! cmcbrowser, :name, :slug, :version, :howto, :cmcplatform_id
  json.url cmcbrowser_url(cmcbrowser, format: :json)
end
