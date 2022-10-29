import axios from 'axios';

// export const API_URL = `http://localhost:8000/api`

const authorize = axios.create({
    withCredentials: true,
    // baseURL: API_URL
})

// Add a request interceptor
authorize.interceptors.request.use(config => {
    let token = localStorage.getItem('bearer');
    token ? config.headers['Authorization'] = `Bearer ${token}` : console.log('401 Unauthorized')
    return config;
}, err => Promise.reject(err));

export default authorize;