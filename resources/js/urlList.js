export function getUrlList()
{
    const base='http://localhost:8000/';
    const baseAPI=base+'api/';
    return{
        base:base,
        baseAPI:baseAPI,
        home:baseAPI+'home',
        login:baseAPI+'admin/login',
        register:baseAPI+'register',
    }
}
