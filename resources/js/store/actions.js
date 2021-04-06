let actions = {
    clearData(context) {
        context.commit('ClearData')
    },
    uploadProfileImage(context, data) {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
        if(context.getters.loggedIn) {
        return new Promise((resolve, reject) => {
        axios
        .post("/api/pic", {
            pic: data.pic
        })
                .then((response) => {
                    console.log(response);
                    resolve(response)
                })
                .catch((err) => {
                    console.log(err.message);
                    reject(err)
                });
            })
        }
    },
    logout(context) {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token

        if(context.getters.loggedIn) {
            return new Promise((resolve, reject) => {
                axios.post("api/logout")
                .then( response => {
                    localStorage.removeItem("token")
                    context.commit('logout')

                    resolve(response)
                })
                .catch(err => {
                    localStorage.removeItem("token")
                    context.commit('logout')
                    reject(err)
                })
            })
        }
    },
    countofproperties({commit}) {
        axios.get('/api/countofproperties')
        .then(response => {
            let count = response.data.length;
            commit('countofproperties', count)
        })
        .catch(err => {
            console.log(err)
        })
    },
    loginUser(context, user) {

        return new Promise((resolve, reject) => {
            axios.post("api/login", {
                email: user.email,
                password: user.password
            })
            .then( response => {
                const token = response.data.token;
                localStorage.setItem("token", token)
                context.commit('loginUser', token)

                resolve(response)
            })
            .catch(err => {
                // console.log(err)
                reject(err)
            })
        })
    },
    registerUser(context, user) {

        return new Promise((resolve, reject) => {
            axios.post("api/signup", {
                firstname: user.firstname,
                lastname: user.lastname,
                phone: user.phone,
                email: user.email,
                password: user.password
            })
            .then( response => {
                console.log(response.data)
                const token = response.data.token;
                localStorage.setItem("token", token)
                context.commit('registerUser', token)

                resolve(response)
            })
            .catch(err => {
                console.log(err)
                reject(err)
            })
        })
    },
    upload(context, data) {
        console.log(data)

        // return new Promise((resolve, reject) => {
        //     axios.post("api/upload", data)
            
        //     .then( response => {
        //         console.log(response.data)
                
        //         resolve(response)
        //     })
        //     .catch(err => {
        //         console.log(err)
        //         reject(err)
        //     })
        // })
    },

        getUser(context) {
            return new Promise((resolve, reject) => {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
            axios.get('api/dashboard')
            .then(response => {
                
                context.commit('getUsa', response.data)
                resolve(response)
            })
            .catch(err => {
                console.log(err.message)
                reject(err)
            })
            });
        },
        get() {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
        axios
        .get("api/methods")
        .then((response) => {
          //this.method = response.data.airtel_no;
          console.log(response.data.airtel_no);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getPic(context) {
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
      return new Promise((resolve, reject) => {
        axios
        .get("api/pic")
        .then((response) => {
          //context.commit()
          resolve(response)
        })
        .catch((err) => {
          console.log(err);
          reject(err)
        });
      })
      
    },
        fone(context) {
            axios.get('api/fone')
            .then(response => {
                context.commit('fone', response.data)
                
            })
            .catch(err => {
                console.log(err)
            })
        },
        ftwo(context) {
            axios.get('api/ftwo')
            .then(response => {
                context.commit('ftwo', response.data)
            })
            .catch(err => {
                console.log(err)
            })
        },
        kira(context) {
            axios.get('api/kira')
            .then(response => {
                context.commit('kira', response.data)
            })
            .catch(err => {
                console.log(err)
            })
        },
        mukono(context) {
            axios.get('api/mukono')
            .then(response => {
                context.commit('mukono', response.data)
            })
            .catch(err => {
                console.log(err)
            })
        },
        
        getMukono(context) {
            axios.get('api/mukono') 
            .then(response => {
                console.log(response.data)
                context.commit('getMukono', response.data)
            })
            .catch(err => {
                console.log(err)
            })
        },
        
        properties(context) {
            return new Promise((resolve, reject) => {
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token

                axios.get('api/see')
                .then(response => {
                    console.log(response.data)
                    context.commit('properties', response.data)
                    resolve(response)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
            })
            
        },
        getUploads(context) {
            axios.get('api/uploads')
            .then(response => {
                console.log(response)
                context.commit('getUploads', response.data)
            })
            .catch(err => {
                console.log(err)
            })
        },
        apartments(context,) {
            return new Promise((resolve, reject) =>{
                axios.get('api/apartment')
            .then(response => {
                context.commit('apartments', response.data)
                resolve(response)
            })
            .catch(err => {
                console.log(err)
                reject(err)
            })
            })
            
        },
        hostels(context) {
            return new Promise((resolve, reject) =>{
                axios.get('/api/hostel')
            .then(response => {
                context.commit('hostels', response.data)
            })
            .catch(err => {
                console.log(err)
            })
            })
            
        },
        arcades(context) {
            return new Promise((resolve, reject) => {
                axios.get('api/arcade')
            .then(response => {
                context.commit('arcades', response.data)
                resolve(response)
            })
            .catch(err => {
                console.log(err)
                reject(err)
            })
            })
            
        },
        malls(context) {
            return new Promise((resolve, reject) => {
                axios.get('api/mall') 
            .then(response => {
                context.commit('malls', response.data)
                resolve(response)
            })
            .catch(err => {
                console.log(err)
            reject(err)
            })
            })
            
        },
        rentals(context) {
            return new Promise((resolve, reject) => {
                axios.get('api/rental')
            .then(response => {
                context.commit('rentals', response.data)
                resolve(response)
            })
            .catch(err => {
                console.log(err)
                reject(err)
            })
            })
            
        },
        officespace(context){
            return new Promise((resolve, reject) => {
                axios.get('api/officespace') 
            .then(response => {
                context.commit('officespace', response.data)
                resolve(response)
            })
            .catch(err => {
                console.log(err)
                reject(err)
            })
            })
            
        },
        
        fetchClients(context) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
            axios.get('api/clients')
            .then(response => {
                context.commit('fetchClients', response.data)
            })
            .catch(err => {
                console.log(err)
            })
        },

        fetchOfficial(context) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
            axios.get('api/official')
            .then(response => {
                console.log(response.data)
                context.commit('fetchOfficial', response.data)
            })
            .catch(err => {
                console.log(err)
            })
        },
        
        UPLOADOFFICIAL(context, post) {

        
            axios.post("api/official", {
                official: post.official,
            })
            .then( response => {
                context.commit('UPLOADOFFICIAL', response.data)
            })
            .catch(err => {
                console.log(err)
            })
        },
        // mtn(context, details) {
        //     axios.post('api/pay', details) 
        //     .then(response => {
        //             console.log(response.data)  
        //             context.commit('status', response.data.status)
                
        //     })
        //     .catch(err => {
        //         console.log(err)
        //     })
        // },
        mtn(context) {
            return new Promise((resolve, reject) => {
                axios.post('api/pay')
                .then(response => {
                    console.log(response.data)
                    context.commit('transaction', response.data)
                    resolve(response)
                })
                .catch(err => {
                    console.log(err)
                    reject(err)
                })
            })
            
        },
        createclient({commit}, client) {
            axios.post('/api/clients', client)
                .then(res => {
                    commit('CREATECLIENT', res.data)
                }).catch(err => {
                    console.log(err)
            })
        },
        getstatus(context, transaction) {
            axios.post('api/status', transaction)
            .then(response => {
                console.log(response.data)
                context.commit('status', response.data)
            })
            .catch(err => {
                console.log(err)
            })
        },

        deleteOfficial({commit}, post) {
        axios.delete(`/api/official/${post.id}`)
            .then(res => {
                if (res.data === 'ok')
                commit('DELETE_OFFICIAL', official)
            }).catch(err => {
                console.log(err)
            })
        },

        deleteClient({commit}, client) {
            return new Promise((resolve, reject) => {
                axios.delete(`/api/clients/${client.id}`)
                .then(res => {
                    if (res.data === 'ok')
                    commit('DELETE_CLIENT', client)
                    resolve(res)
                }).catch(err => {
                    console.log(err)
                    reject(err)

                })
            })
        },
        
           
        
        
}

export default actions