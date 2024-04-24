import Authenticated from "@/Layouts/AuthenticatedLayout.jsx";

export default function ChatLayout({ head, children }) {
    return (
        <Authenticated head={head}>
            <div className="bg-white p-4 rounded-xl border">
                {children}
            </div>
        </Authenticated>
    )
}
