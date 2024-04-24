import { usePage } from "@inertiajs/react";

/**
 * Custom hook to handle authentication-related functionality.
 * @returns {{auth: Object|null, user: Object|null, isAuthenticated: boolean, isRoomOwner: Function}} An object containing user data, authentication status, and a function to check if the user is the owner of a room.
 */
export default function useAuth() {
    // Accessing authentication data from the current page using Inertia's usePage hook
    const { auth } = usePage();

    // Extracting user data from authentication data
    const { user } = auth;

    // Checking if the user is authenticated
    const isAuthenticated = !!user;

    /**
     * Function to check if the user is the owner of a room.
     * @param {Object} room The room to check ownership for.
     * @returns {boolean} A boolean indicating whether the user is the owner of the room.
     */
    const isRoomOwner = (room) => {
        // Checking if the user is authenticated and if the user's ID matches the room's creator ID
        return isAuthenticated && user.id === room.created_by;
    };

    // Returning user data, authentication status, and the room ownership check function
    return {
        auth, // The authentication data
        user, // The authenticated user's data
        isAuthenticated, // Boolean indicating whether the user is authenticated or not
        isRoomOwner // Function to check if the user is the owner of a room
    };
};
