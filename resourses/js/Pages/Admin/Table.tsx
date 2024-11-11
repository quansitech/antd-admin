import {usePage} from "@inertiajs/react";
import {lazy, Suspense, useEffect, useState} from "react";
import {ReactComponentLike} from "prop-types";
import {Table} from "@quansitech/antd-admin";

export default function () {
    const props = usePage<any>().props

    const [Component, setComponent] = useState<ReactComponentLike>()
    useEffect(() => {
        setComponent(lazy(() => Table))
    }, []);

    return <>{Component
        && <Suspense><Component {...props}/></Suspense>
    }</>
}