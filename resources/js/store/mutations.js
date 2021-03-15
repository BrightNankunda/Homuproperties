let mutations = {
    ClearData(state) {
        state.properties = [],
        state.user = [],
        state.clients = []
    },
    countofproperties(state, count) {
        state.countofproperties = count
    },
    loginUser(state, token) {
        state.token = token
    },
    registerUser(state, token) {
        state.token = token
    },
    getUsa(state, user) {
        return state.user = user
    },
    apartments(state, apartments) {
        return state.apartments = apartments
    },
    hostels(state, hostels) {
        return state.hostels = hostels
    },
    arcades(state, arcades) {
        return state.arcades = arcades
    },
    malls(state, malls) {
        return state.malls = malls
    },
    rentals(state, rentals) {
        return state.rentals = rentals
    },
    officespace(state, officespace) {
        return state.officespace = officespace
    },
    getMukono(state, mukonos) {
        return state.mukonos = mukonos
    },
    getProfile(state, profile) {
        return state.profile = profile
    },
    getProperty(state, property) {
        return state.profile = property
    },
    getUploads(state, uploads) {
        return state.uploads = uploads
    },
    fetchOfficial(state, official) {
        return state.official = official
    },
    fetchClients(state, clients) {
        return state.clients = clients
    },
    UPLOADOFFICIAL(state, official) {
        state.official = official
    },
    CREATECLIENT(state, client) {
        state.clients.unshift(client)
    },
    DELETE_OFFICIAL(state, officiaL) {
        state.official.splice(index, 1)
    },
    DELETE_CLIENT(state, client) {
        let index = state.clients.findIndex(item => item.id === client.id)
        state.clients.splice(index, 1)
    },
    properties(state, properties) {
        return state.properties = properties
    },
    
    fone(state, fone) {
        return state.fone = fone
    },
    ftwo(state, ftwo) {
        return state.ftwo = ftwo
    },
    kira(state, kira) {
        return state.kira = kira
    },
    mukono(state, mukono) {
        return state.mukono = mukono
    },
    status(state, status) {
        return state.status = status
    },
    transaction(state, transaction) {
        return state.transaction = transaction
    },
    logout(state) {
        state.token = null
    }
}

export default mutations