export const checkPermisssion = (permissionName) => {
  const userPermissions = JSON.parse(localStorage.getItem("userPermissions"));
  if (userPermissions.includes(permissionName)) return true;
  return false;
};
