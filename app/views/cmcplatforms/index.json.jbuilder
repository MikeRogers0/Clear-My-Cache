json.array!(@cmcplatforms) do |cmcplatform|
  json.extract! cmcplatform, :name, :slug, :version, :howto
  json.url cmcplatform_url(cmcplatform, format: :json)
end
