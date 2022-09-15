import axios from 'axios';
import constants from '../../config/constants';

class MercadoLibreRemoteService 
{
    constructor() {
        this.url = constants.BASE_URL;       
    }

     async findAll() {
        const response =  await axios.get(this.url + 'mercado-libre');
        return response.data;
    }
}

export default new MercadoLibreRemoteService();