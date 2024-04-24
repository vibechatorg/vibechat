import Authenticated from '@/Layouts/AuthenticatedLayout';
import {memo} from "react";

const Dashboard = memo(function () {
    return (
        <Authenticated head="Dashboard">
            <div className="bg-white dark:bg-gray-800 border shadow overflow-hidden sm:rounded-lg">
                <div className="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
            </div>
            <div className="bg-red-400/30 mt-5 shadow-red-300 border border-red-600 dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                <div className="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
            </div>
        </Authenticated>
    );
});

export default Dashboard;
