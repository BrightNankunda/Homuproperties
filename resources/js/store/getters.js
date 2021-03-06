let getters = {
    user: state => {
        return state.user
    },
    status: state => {
        return state.status
    },
    transaction: state => {
        return state.transaction
    },
    fone: state => {
        return state.fone
    },
    allUsers: state => {
        return state.allUsers
    },
    personalData: state => {
        return state.personalData
    },
    ftwo: state => {
        return state.ftwo
    },
    countofproperties: state => {
        return state.countofproperties
    },
    kira: state => {
        return state.kira
    },
    mukono: state => {
        return state.mukono
    },
    properties: state => {
        return state.properties
    },
    hostels: state => {
        return state.hostels
    },
    arcades: state => {
        return state.arcades
    },
    apartments: state=> {
        return state.apartments
    },
    malls: state=> {
        return state.malls
    },
    rentals: state=> {
        return state.rentals
    },
    officespace: state=> {
        return state.officespace
    },
    SearchResults: state=> {
        return state.SearchResults
    },

    // hostels: state => {
    //     return state.images.filter(image => image.type === 'hostel')
    // },
    apartmentsKampala: state => {
        return state.apartments.filter(apartment => apartment.location === 'Kampala')
    },
    apartmentsKira: state => {
        return state.apartments.filter(apartment => apartment.type === 'Kira')
    },
    clients: state => {
        return state.clients
    },
    laravelData: state => {
        return state.laravelData
    },
    official: state => {
        return state.official
    },
    uploads: state => {
        return state.uploads
    },
    value: state => {
        return state.value
    },
    loggedIn(state) {
        return state.token != null
    }
}

export default getters