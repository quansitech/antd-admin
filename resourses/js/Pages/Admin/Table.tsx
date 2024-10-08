import {usePage} from "@inertiajs/react";
import {lazy, Suspense, useEffect, useState} from "react";
import {ReactComponentLike} from "prop-types";

export default function () {
    const props = usePage<any>().props

    const [Component, setComponent] = useState<ReactComponentLike>()
    useEffect(() => {
        setComponent(lazy(() => import('@quansitech/antd-admin/components/Table')))
    }, []);

    return <>{Component
        && <Suspense><Component {...props}/></Suspense>
    }</>
}