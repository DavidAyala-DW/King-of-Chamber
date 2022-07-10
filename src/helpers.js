export function filename(string){

  const url = string.split(window.location.host+"/")[1] ?? string.split(window.location.host+"/")[0];
  const absolutePath = url.substring(0,url.length - 1);
  const lastPosition = absolutePath.lastIndexOf("/");
  const relativePath = absolutePath.substring( lastPosition , absolutePath.length );
  return relativePath;

}
